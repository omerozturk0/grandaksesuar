<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\PermissionRepository;
use App\Helpers\Backend;
use App\Http\Requests\Backend\PermissionRequest;
use App\Permission;

class PermissionController extends Controller
{
    private $repository;
    private $backend;

    public function __construct(PermissionRepository $repository, Backend $backend)
    {
        $this->repository = $repository;
        $this->backend = $backend;
    }

    public function index()
    {
        $permissions = $this->repository->allPaginate(10);

        if (!count($permissions)) {
            return $this->backend->ifContentNotCount('permission', true);
        }

        return view('backend.panel.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('backend.panel.permission.create');
    }

    public function store(PermissionRequest $request)
    {
        $this->repository->create($request);

        alert()->success(null, 'Kayıt eklendi!');

        return redirect()->route('admin.permission.index');
    }

    public function edit(Permission $permission)
    {
        return view('backend.panel.permission.edit', compact('permission'));
    }

    public function update(Permission $permission, PermissionRequest $request)
    {
        $this->repository->update($permission, $request);

        alert()->success(null, 'Kayıt güncellendi!');

        return redirect()->back();
    }

    public function destroy(Permission $permission)
    {
        $this->repository->destroy($permission);

        alert()->success(null, 'Kayıt silindi!');

        return route('admin.permission.index');
    }
}
