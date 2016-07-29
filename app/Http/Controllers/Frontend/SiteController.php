<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Repositories\StaticRepository;
use App\Helpers\NavigationBar;

class SiteController extends Controller
{
    public function __construct(Post $post, StaticRepository $staticRepo, NavigationBar $nav)
    {
        $this->post = $post;
        $this->staticRepo = $staticRepo;
        $this->nav = $nav;
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

            // Ürünler
            case 2:
                return view('frontend.product-detail', compact('post', 'static', 'nav'));
            break;

            default:
                return view('frontend.index');
            break;
        }
    }

    public function findPostBySlug($slug)
    {
        $post = $this->post->whereTranslation('slug', $slug)->where('is_active', 1)->with('translates')->first();

        if (!$post) {
            return abort(404);
        }

        return $post;
    }
}
