<?php

namespace App\Repositories;

use App\Helpers\Backend;
use App\Role;

class RoleRepository extends BaseRepository
{
    private $backend;
    protected $model;

    public function __construct(Role $role, Backend $backend)
    {
        $this->model = $role;
        $this->backend = $backend;
    }

    public function allPaginate($count)
    {
        if (auth()->user()->hasRole('owner')) {
            return $this->model->paginate($count);
        }

        return $this->model->where('name', '!=', 'owner')->paginate($count);
    }

    public function all()
    {
        if (auth()->user()->hasRole('owner')) {
            return $this->model->all();
        }

        return $this->model->where('name', '!=', 'owner')->all();
    }

    public function create($request)
    {
        $this->backend->RequestsFilter($request);

        $role = $this->model;
        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
    }

    public function update($role, $request)
    {
        $this->backend->RequestsFilter($request);

        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $role->save();
    }

    public function destroy($role)
    {
        $role->delete();
    }

    public function attachPermissions($id, $request)
    {
        $role = $this->getById($id);
        $role->perms()->sync([]);
        foreach ($request->except('_token') as $key => $value) {
            $role->attachPermission(\App\Permission::where('name', $key)->first());
        }
    }
}
