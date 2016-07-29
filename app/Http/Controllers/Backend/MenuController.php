<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Backend;
use App\Menu;
use App\Repositories\MenuRepository;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\MenuRequest;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    private $backend;
    private $menuRepository;
    private $pageRepository;

    public function __construct(Backend $backend, MenuRepository $menuRepository, PageRepository $pageRepository)
    {
        $this->backend = $backend;
        $this->menuRepository = $menuRepository;
        $this->pageRepository = $pageRepository;
    }

    public function index()
    {
        $menus = $this->menuRepository->allRoots();

        if (!count($menus)) {
            return $this->backend->ifContentNotCount('menu');
        }

        return view('backend.panel.menu.index', compact('menus'));
    }

    public function create(Request $request)
    {
        $menus = $this->menuRepository->allWithHierarchy();
        $pages = $this->pageRepository->all();

        if ($request->has('parent')) {
            $parent = $request->get('parent');
        }

        return view('backend.panel.menu.create', compact('menus', 'pages', 'parent'));
    }

    public function store(MenuRequest $request)
    {
        $this->menuRepository->create($request);

        alert()->success(null, 'Kayıt eklendi!');

        return redirect()->route('admin.menu.index');
    }

    public function edit(Menu $menu, Request $request)
    {
        $menus = $this->menuRepository->notSelfWithHierarchy($menu);
        $pages = $this->pageRepository->all();
        $languages = \LaravelLocalization::getSupportedLocales();

        if ($request->has('lang')) {
            App()->setLocale($request->get('lang'));
        }

        return view('backend.panel.menu.edit', compact('menu', 'menus', 'pages', 'languages'));
    }

    public function update(Menu $menu, MenuRequest $request)
    {
        $this->menuRepository->update($menu, $request);

        alert()->success(null, 'Kayıt güncellendi!');

        return redirect()->back();
    }

    public function destroy(Menu $menu)
    {
        $this->menuRepository->destroy($menu);

        alert()->success(null, 'Kayıt silindi!');

        return route('admin.menu.index');
    }

    public function getChild(Menu $menu)
    {
        $menus = $this->menuRepository->getChild($menu);

        if (!count($menus)) {
            return redirect('admin/menu/create?parent=' . $menu->id);
        }

        return view('backend.panel.menu.index', compact('menus', 'menu'));
    }
}
