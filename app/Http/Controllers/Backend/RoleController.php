<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\RoleRequest;
use App\Http\Controllers\Controller;
use App\Repositories\RoleRepository;
use App\Repositories\PermissionRepository;
use App\Helpers\Backend;
use App\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $repository;
    private $backend;
    private $permissionRepository;

    public function __construct(RoleRepository $repository, Backend $backend, PermissionRepository $permissionRepository)
    {
        $this->repository = $repository;
        $this->permissionRepository = $permissionRepository;
        $this->backend = $backend;
    }

    public function index()
    {
        $roles = $this->repository->allPaginate(10);

        if (!count($roles)) {
            return $this->backend->ifContentNotCount('role', true);
        }

        return view('backend.panel.role.index', compact('roles'));
    }

    public function create()
    {
        return view('backend.panel.role.create');
    }

    public function store(RoleRequest $request)
    {
        $this->repository->create($request);

        alert()->success(null, 'Kayıt eklendi!');

        return redirect()->route('admin.role.index');
    }

    public function edit(Role $role)
    {
        $permissions = $this->permissionRepository->all();

        return view('backend.panel.role.edit', compact('role', 'permissions'));
    }

    public function update(Role $role, RoleRequest $request)
    {
        $this->repository->update($role, $request);

        alert()->success(null, 'Kayıt güncellendi!');

        return redirect()->back();
    }

    public function destroy(Role $role)
    {
        $this->repository->destroy($role);

        alert()->success(null, 'Kayıt silindi!');

        return route('admin.role.index');
    }

    public function attachPermissions($id, Request $request)
    {
        $this->repository->attachPermissions($id, $request);

        alert()->success(null, 'Kayıt güncellendi!');

        return redirect()->back();
    }
}
