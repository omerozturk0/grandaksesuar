<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Backend;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use App\User;
use App\Http\Requests\Backend\UserRequest;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $backend;
    private $repository;
    private $roleRepository;

    public function __construct(Backend $backend, UserRepository $repository, RoleRepository $roleRepository)
    {
        $this->backend = $backend;
        $this->repository = $repository;
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $users = $this->repository->allPaginate();

        if (!count($users)) {
            return $this->backend->ifContentNotCount('user');
        }

        return view('backend.panel.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->roleRepository->all();

        return view('backend.panel.user.create', compact('roles'));
    }

    public function store(UserRequest $request)
    {
        $this->repository->create($request);

        alert()->success(null, 'Kayıt eklendi!');

        return redirect()->route('admin.user.index');
    }

    public function edit(User $user)
    {
        $roles = $this->roleRepository->all();

        return view('backend.panel.user.edit', compact('user', 'roles'));
    }

    public function update(UserRequest $request, User $user)
    {
        if ($this->repository->update($user, $request)) {
            alert()->success(null, 'Kayıt güncellendi!');
        } else {
            alert()->error(null, 'Kayıt güncelleme başarısız!');
        }

        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $this->repository->destroy($user);

        alert()->success(null, 'Kayıt silindi!');

        return route('admin.user.index');
    }
}
