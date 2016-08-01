<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Repositories\StaticRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Helpers\NavigationBar;

class SiteController extends Controller
{
    public function __construct(Post $post, StaticRepository $staticRepo, NavigationBar $nav, CategoryRepository $catRepo, ProductRepository $productRepo)
    {
        $this->post = $post;
        $this->staticRepo = $staticRepo;
        $this->nav = $nav;
        $this->catRepo = $catRepo;
        $this->productRepo = $productRepo;
    }
    public function index()
    {
        $static = $this->staticRepo;
        $nav = $this->nav;

        return view('frontend.index', compact('static', 'nav'));
    }

    public function routeBySlug($slug)
    {
        $post = $this->findPostBySlug($slug);
        $static = $this->staticRepo;
        $nav = $this->nav;

        switch ($post->module_id) {
            // Sayfalar
            case 1:
                # code...
            break;

            // Ürün Detay
            case 2:
                $this->productRepo->visited($post->id);

                return view('frontend.product-detail', compact('post', 'static', 'nav'));
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

        return view('frontend.cat', compact('post', 'static', 'nav', 'popularProducts', 'newestProducts', 'discountProducts'));
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
        $cat = $this->catRepo->model->whereTranslation('slug', $slug)->where('is_active', 1)->with('translates')->first();

        if (!$cat) {
            return abort(404);
        }

        return $cat;
    }
}
