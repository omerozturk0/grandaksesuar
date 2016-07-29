<?php

namespace App\Repositories;

use App\Helpers\Backend;
use App\Permission;

class PermissionRepository extends BaseRepository
{
    private $backend;
    protected $model;

    public function __construct(Permission $permission, Backend $backend)
    {
        $this->model = $permission;
        $this->backend = $backend;
    }

    public function allPaginate($count)
    {
        return $this->model->paginate($count);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create($request)
    {
        $this->backend->RequestsFilter($request);

        $permission = $this->model;
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
    }

    public function update($permission, $request)
    {
        $this->backend->RequestsFilter($request);

        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();
    }

    public function destroy($permission)
    {
        $permission->delete();
    }
}
