<?php

namespace App\Repositories;

use App\Helpers\Backend;
use App\Menu;

class MenuRepository extends BaseRepository
{
    private $backend;

    public function __construct(Menu $menu, Backend $backend)
    {
        $this->model = $menu;
        $this->backend = $backend;
    }

    public function allRoots()
    {
        return $this->model->roots()->with('translates')->paginate(10);
    }

    public function all()
    {
        return $this->model->with('translates')->where('is_active', 1)->get();
    }

    public function notSelfWithHierarchy($menu)
    {
        return $this->model->where('id', '<>', $menu->id)->with('translates')->orderBy('lft')->get();
    }

    public function allWithHierarchy()
    {
        return $this->model->with('translates')->where('is_active', 1)->orderBy('lft')->get();
    }

    public function getChild($menu)
    {
        return $menu->children()->with('translates')->paginate(10);
    }

    public function notSelf($menu)
    {
        return $this->model->where('id', '<>', $menu->id)->with('translates')->get();
    }

    public function create($request)
    {
        $this->backend->RequestsFilter($request);

        $menu = $this->model;
        $menu->parent_id = $request->parent_id;
        $menu->post_id = $request->post_id;
        $menu->special_url = $request->special_url;
        $menu->native = $request->native;
        $menu->is_active = $request->has('is_active');
        $menu->save();

        $this->backend->translateCurrentLocale($menu, $request->only('name'), $request);
    }

    public function update($menu, $request)
    {
        $this->backend->RequestsFilter($request);

        $menu->parent_id = $request->parent_id;
        $menu->post_id = $request->post_id;
        $menu->special_url = $request->special_url;
        $menu->native = $request->native;
        $menu->is_active = $request->has('is_active');
        $menu->save();

        $this->backend->translateCurrentLocale($menu, $request->only('name'), $request);
    }

    public function destroy($menu)
    {
        $menu->delete();
    }
}
