<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Post;
use App\Repositories\StaticRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Helpers\NavigationBar;
use App\Helpers\FrontendMenus;

class SiteController extends Controller
{
    public function __construct(Post $post, StaticRepository $staticRepo, NavigationBar $nav, CategoryRepository $catRepo, ProductRepository $productRepo, FrontendMenus $frontMenus)
    {
        $this->post = $post;
        $this->staticRepo = $staticRepo;
        $this->nav = $nav;
        $this->frontMenus = $frontMenus;
        $this->catRepo = $catRepo;
        $this->productRepo = $productRepo;
    }
    public function index()
    {
        $static = $this->staticRepo;
        $nav = $this->nav;
        $frontMenus = $this->frontMenus;
        $popularProducts = $this->productRepo->allPopularProducts();
        $newestProducts = $this->productRepo->allNewestProducts();
        $discountProducts = $this->productRepo->allDiscountProducts();

        return view('frontend.index', compact('static', 'nav', 'frontMenus', 'popularProducts', 'newestProducts', 'discountProducts'));
    }

    public function routeBySlug($slug)
    {
        $post = $this->findPostBySlug($slug);
        $static = $this->staticRepo;
        $nav = $this->nav;
        $frontMenus = $this->frontMenus;

        switch ($post->module_id) {
            // Sayfalar
            case 1:
                return view('frontend.page', compact('post', 'static', 'nav', 'frontMenus'));
            break;

            // Ürün Detay
            case 2:
                $this->productRepo->visited($post->id);

                return view('frontend.product-detail', compact('post', 'static', 'nav', 'frontMenus'));
            break;

            default:
                return view('frontend.index');
            break;
        }
    }

    public function routeCatBySlug($slug = null)
    {
        $post = $this->findCatBySlug($slug);
        $popularProducts = $this->productRepo->allPopularProducts();
        $newestProducts = $this->productRepo->allNewestProducts();
        $discountProducts = $this->productRepo->allDiscountProducts();
        $static = $this->staticRepo;
        $nav = $this->nav;
        $frontMenus = $this->frontMenus;

        return view('frontend.cat', compact('post', 'static', 'nav', 'frontMenus', 'popularProducts', 'newestProducts', 'discountProducts'));
    }

    public function findPostBySlug($slug)
    {
        $post = $this->post->whereTranslation('slug', $slug)->where('is_active', 1)->with('translates')->first();

        if (!$post) {
            return abort(404);
        }

        return $post;
    }

    public function findCatBySlug($slug)
    {
        $cat = $this->catRepo->model->whereTranslation('slug', $slug)->where('is_active', 1)->with('translates', 'pictures')->first();

        if (!$cat) {
            return abort(404);
        }

        return $cat;
    }
}
