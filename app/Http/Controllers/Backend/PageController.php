<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Backend;
use App\Post;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\PageRequest;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    private $backend;
    private $pageRepository;

    public function __construct(Backend $backend, PageRepository $pageRepository)
    {
        $this->backend = $backend;
        $this->pageRepository = $pageRepository;
    }

    public function index()
    {
        $pages = $this->pageRepository->allPaginate();

        if (!count($pages)) {
            return $this->backend->ifContentNotCount('page');
        }

        return view('backend.panel.page.index', compact('pages'));
    }

    public function create()
    {
        return view('backend.panel.page.create');
    }

    public function store(PageRequest $request)
    {
        $this->pageRepository->create($request);

        alert()->success(null, 'Kayıt eklendi!');

        return redirect()->route('admin.page.index');
    }

    public function edit(Post $page, Request $request)
    {
        $languages = \LaravelLocalization::getSupportedLocales();

        if ($request->has('lang')) {
            App()->setLocale($request->get('lang'));
        }

        return view('backend.panel.page.edit', compact('page', 'languages'));
    }

    public function update(PageRequest $request, Post $page)
    {
        $this->pageRepository->update($page, $request);

        alert()->success(null, 'Kayıt güncellendi!');

        return redirect()->back();
    }

    public function destroy(Post $page)
    {
        $this->pageRepository->destroy($page);

        alert()->success(null, 'Kayıt silindi!');

        return route('admin.page.index');
    }
}
