<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Backend;
use App\CustomerGroup;
use App\Repositories\CustomerGroupRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\CustomerGroupRequest;
use App\Http\Controllers\Controller;

class CustomerGroupController extends Controller
{
    private $backend;
    private $customergroupRepository;

    public function __construct(Backend $backend, CustomerGroupRepository $customergroupRepository)
    {
        $this->backend = $backend;
        $this->customergroupRepository = $customergroupRepository;
    }

    public function index()
    {
        $customergroups = $this->customergroupRepository->allPaginate();

        if (!count($customergroups)) {
            return $this->backend->ifContentNotCount('customergroup', true);
        }

        return view('backend.panel.customergroup.index', compact('customergroups'));
    }

    public function create()
    {
        return view('backend.panel.customergroup.create');
    }

    public function store(CustomerGroupRequest $request)
    {
        $this->customergroupRepository->create($request);

        alert()->success(null, 'Kayıt eklendi!');

        return redirect()->route('admin.customergroup.index');
    }

    public function edit(CustomerGroup $customergroup, Request $request)
    {
        $languages = \LaravelLocalization::getSupportedLocales();

        if ($request->has('lang')) {
            App()->setLocale($request->get('lang'));
        }

        return view('backend.panel.customergroup.edit', compact('customergroup', 'languages'));
    }

    public function update(CustomerGroupRequest $request, CustomerGroup $customergroup)
    {
        $this->customergroupRepository->update($customergroup, $request);

        alert()->success(null, 'Kayıt güncellendi!');

        return redirect()->back();
    }

    public function destroy(CustomerGroup $customergroup)
    {
        $this->customergroupRepository->destroy($customergroup);

        alert()->success(null, 'Kayıt silindi!');

        return route('admin.customergroup.index');
    }
}
