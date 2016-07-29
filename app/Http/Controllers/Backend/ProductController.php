<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Backend;
use App\Post;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\AttributeRepository;
use App\Repositories\CustomerGroupRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ProductRequest;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    private $backend;
    private $productRepository;

    public function __construct(Backend $backend, ProductRepository $productRepository)
    {
        $this->backend = $backend;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->allPaginate();

        if (!count($products)) {
            return $this->backend->ifContentNotCount('product');
        }

        return view('backend.panel.product.index', compact('products'));
    }

    public function create(CategoryRepository $catRepo, AttributeRepository $attrRepo, CustomerGroupRepository $customergroupRepo)
    {
        $categories = $catRepo->allWithHierarchy();

        $attributes = $attrRepo->allWithHierarchy();

        $customergroups = $customergroupRepo->all();

        return view('backend.panel.product.create', compact('categories', 'attributes', 'customergroups'));
    }

    public function store(ProductRequest $request)
    {
        $this->productRepository->create($request);

        alert()->success(null, 'Kayıt eklendi!');

        return redirect()->route('admin.product.index');
    }

    public function edit(Post $product, Request $request, CategoryRepository $catRepo, AttributeRepository $attrRepo, CustomerGroupRepository $customergroupRepo)
    {
        $languages = \LaravelLocalization::getSupportedLocales();

        $categories = $catRepo->allWithHierarchy();

        $attributes = $attrRepo->allWithHierarchy();

        $customergroups = $customergroupRepo->all();

        if ($request->has('lang')) {
            App()->setLocale($request->get('lang'));
        }

        return view('backend.panel.product.edit', compact('product', 'languages', 'categories', 'attributes', 'customergroups'));
    }

    public function update(ProductRequest $request, Post $product)
    {
        $this->productRepository->update($product, $request);

        alert()->success(null, 'Kayıt güncellendi!');

        return redirect()->back();
    }

    public function destroy(Post $product)
    {
        $this->productRepository->destroy($product);

        alert()->success(null, 'Kayıt silindi!');

        return route('admin.product.index');
    }
}
