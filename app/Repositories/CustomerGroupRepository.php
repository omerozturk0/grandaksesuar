<?php

namespace App\Repositories;

use App\Helpers\Backend;
use App\CustomerGroup;

class CustomerGroupRepository extends BaseRepository
{
    private $backend;

    public function __construct(CustomerGroup $customergroup, Backend $backend)
    {
        $this->model = $customergroup;
        $this->backend = $backend;
    }

    public function allPaginate()
    {
        return $this->model->with('translates')->paginate(10);
    }

    public function all()
    {
        return $this->model->where('is_active', 1)->with('translates')->get();
    }

    public function create($request)
    {
        $this->backend->RequestsFilter($request);

        $customergroup = new $this->model();
        $customergroup->is_active = $request->has('is_active');
        $customergroup->save();

        $this->backend->translateCurrentLocale($customergroup, $request->only('title', 'dsc'), $request);
    }

    public function update($customergroup, $request)
    {
        $this->backend->RequestsFilter($request);

        $customergroup->is_active = $request->has('is_active');
        $customergroup->save();

        $this->backend->translateCurrentLocale($customergroup, $request->only('title', 'dsc'), $request);
    }

    public function destroy($customergroup)
    {
        $customergroup->delete();
    }
}
