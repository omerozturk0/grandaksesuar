<?php

namespace App\Repositories;

use App\Helpers\Backend;
use App\Attribute;

class AttributeRepository extends BaseRepository
{
    private $backend;

    public function __construct(Attribute $attribute, Backend $backend)
    {
        $this->model = $attribute;
        $this->backend = $backend;
    }

    public function allRoots()
    {
        return $this->model->roots()->with('translates')->paginate(10);
    }

    public function activeRoots()
    {
        return $this->model->roots()->where('is_active', 1)->orderBy('lft')->with('translates', 'children')->get();
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

        $attribute = new $this->model();
        $attribute->parent_id = $request->parent_id;
        $attribute->is_active = $request->has('is_active');
        $attribute->save();

        $this->backend->translateCurrentLocale($attribute, $request->only('title', 'dsc'), $request);
    }

    public function update($attribute, $request)
    {
        $this->backend->RequestsFilter($request);

        $attribute->parent_id = $request->parent_id;
        $attribute->is_active = $request->has('is_active');
        $attribute->save();

        $this->backend->translateCurrentLocale($attribute, $request->only('title', 'dsc'), $request);
    }

    public function destroy($attribute)
    {
        $attribute->delete();
    }
}
