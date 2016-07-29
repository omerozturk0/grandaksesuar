<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Backend;
use App\StaticContent;
use App\Repositories\StaticRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\StaticRequest;
use App\Http\Controllers\Controller;

class StaticController extends Controller
{
    private $backend;
    private $staticRepository;

    public function __construct(Backend $backend, StaticRepository $staticRepository)
    {
        $this->backend = $backend;
        $this->staticRepository = $staticRepository;
    }

    public function index()
    {
        $statics = $this->staticRepository->allPaginate();

        if (!count($statics)) {
            return $this->backend->ifContentNotCount('static', true);
        }

        return view('backend.panel.static.index', compact('statics'));
    }

    public function create()
    {
        return view('backend.panel.static.create');
    }

    public function store(StaticRequest $request)
    {
        $this->staticRepository->create($request);

        alert()->success(null, 'Kayıt eklendi!');

        return redirect()->route('admin.static.index');
    }

    public function edit(StaticContent $static, Request $request)
    {
        $languages = \LaravelLocalization::getSupportedLocales();

        if ($request->has('lang')) {
            App()->setLocale($request->get('lang'));
        }

        return view('backend.panel.static.edit', compact('static', 'languages'));
    }

    public function update(StaticRequest $request, StaticContent $static)
    {
        $this->staticRepository->update($static, $request);

        alert()->success(null, 'Kayıt güncellendi!');

        return redirect()->back();
    }

    public function destroy(StaticContent $static)
    {
        $this->staticRepository->destroy($static);

        alert()->success(null, 'Kayıt silindi!');

        return route('admin.static.index');
    }
}
