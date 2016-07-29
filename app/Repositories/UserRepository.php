<?php

namespace App\Repositories;

use App\Helpers\Backend;
use App\User;
use App\Role;

class UserRepository extends BaseRepository
{
    private $backend;
    protected $roleModel;

    public function __construct(User $user, Backend $backend, Role $roleModel)
    {
        $this->model = $user;
        $this->backend = $backend;
        $this->roleModel = $roleModel;
    }

    public function allPaginate()
    {
        if (\Auth::user()->hasRole('owner')) {
            return $this->model->whereNotIn('id', [\Auth::user()->id])->paginate(10);
        } else {
            return $this->model->whereNotIn('id', [\Auth::user()->id])->whereHas(
                'roles',
                function ($q) {
                    $q->where('name', 'customer');
                }
            )->paginate(10);
        }
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create($request)
    {
        $this->backend->RequestsFilter($request);

        $user = new $this->model();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->is_active = $request->has('is_active');
        $user->save();

        $user->roles()->sync($request->get('role'));
    }

    public function update($user, $request)
    {
        $this->backend->RequestsFilter($request);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('old_password') and $request->has('password')) {
            if (\Hash::check($request->get('old_password'), $user->password)) {
                $user->password = $request->get('password');

                return true;
            } else {
                return false;
            }
        }
        $user->is_active = $request->has('is_active');
        $user->roles()->sync($request->get('role'));
        $user->save();

        return true;
    }

    public function destroy($user)
    {
        $user->delete();
    }
}
