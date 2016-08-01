<?php

namespace App\Repositories;

use App\Helpers\Backend;
use App\Category;

class CategoryRepository extends BaseRepository
{
    private $backend;
    public $model;

    public function __construct(Category $category, Backend $backend)
    {
        $this->model = $category;
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
        return $this->model->where('is_active', 1)->orderBy('lft')->with('translates')->get();
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

        $category = new $this->model();
        $category->parent_id = $request->parent_id;
        $category->is_active = $request->has('is_active');
        $category->save();

        $this->backend->translateCurrentLocale($category, $request->only('name', 'dsc'), $request);
    }

    public function update($category, $request)
    {
        $this->backend->RequestsFilter($request);

        $category->parent_id = $request->parent_id;
        $category->is_active = $request->has('is_active');
        $category->save();

        $this->backend->translateCurrentLocale($category, $request->only('name', 'dsc'), $request);
    }

    public function destroy($category)
    {
        $category->delete();
    }
}
