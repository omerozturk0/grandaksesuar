<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Backend;
use App\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\CategoryRequest;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    private $backend;
    private $categoryRepository;

    public function __construct(Backend $backend, CategoryRepository $categoryRepository)
    {
        $this->backend = $backend;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->allRoots();

        if (!count($categories)) {
            return $this->backend->ifContentNotCount('category', true);
        }

        return view('backend.panel.category.index', compact('categories'));
    }

    public function create(Request $request)
    {
        $categories = $this->categoryRepository->allWithHierarchy();

        if ($request->has('parent')) {
            $parent = $request->get('parent');
        }

        return view('backend.panel.category.create', compact('categories', 'parent'));
    }

    public function store(CategoryRequest $request)
    {
        $this->categoryRepository->create($request);

        alert()->success(null, 'Kayıt eklendi!');

        return redirect()->route('admin.category.index');
    }

    public function edit(Category $category, Request $request)
    {
        $categories = $this->categoryRepository->notSelfWithHierarchy($category);

        $languages = \LaravelLocalization::getSupportedLocales();

        if ($request->has('lang')) {
            App()->setLocale($request->get('lang'));
        }

        return view('backend.panel.category.edit', compact('category', 'languages', 'categories'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $this->categoryRepository->update($category, $request);

        alert()->success(null, 'Kayıt güncellendi!');

        return redirect()->back();
    }

    public function destroy(Category $category)
    {
        $this->categoryRepository->destroy($category);

        alert()->success(null, 'Kayıt silindi!');

        return route('admin.category.index');
    }

    public function getChild(Category $category)
    {
        $categories = $this->categoryRepository->getChild($category);

        if (!count($categories)) {
            return redirect('admin/category/create?parent=' . $category->id);
        }

        return view('backend.panel.category.index', compact('categories', 'category'));
    }
}
