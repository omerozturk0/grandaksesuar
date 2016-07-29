<?php

namespace App\Repositories;

use App\Helpers\Backend;
use App\Post;

class PageRepository extends BaseRepository
{
    private $backend;
    private $galleryRepository;
    private $moduleId = 1;

    public function __construct(Post $page, Backend $backend, GalleryRepository $galleryRepository)
    {
        $this->model = $page;
        $this->backend = $backend;
        $this->galleryRepository = $galleryRepository;
    }

    public function allPaginate()
    {
        return $this->model->module($this->moduleId)->with('translates')->paginate(10);
    }

    public function all()
    {
        return $this->model->module($this->moduleId)->with('translates')->get();
    }

    public function create($request)
    {
        $this->backend->RequestsFilter($request);

        $page = new $this->model();
        $page->dsc = $request->dsc;
        $page->kyw = $request->kyw;
        $page->module_id = $this->moduleId;
        $page->is_static = $request->has('is_static');
        $page->has_slider = $request->has('has_slider');
        $page->native = $request->native;
        $page->is_active = $request->has('is_active');
        $page->save();

        $this->backend->translateCurrentLocale($page, $request->only('name', 'title', 'content'), $request);
    }

    public function update($page, $request)
    {
        $this->backend->RequestsFilter($request);

        $page->dsc = $request->dsc;
        $page->kyw = $request->kyw;
        $page->is_static = $request->has('is_static');
        $page->has_slider = $request->has('has_slider');
        $page->native = $request->native;
        $page->is_active = $request->has('is_active');
        $page->save();

        $this->backend->translateCurrentLocale($page, $request->only('name', 'title', 'content'), $request);
    }

    public function destroy($page)
    {
        $images = $this->galleryRepository->model->where('post_id', $page->id)->get();

        foreach ($images as $image) {
            \File::delete(public_path().'/userfiles/images/'.$image->name);
        }
        foreach ($images as $image) {
            \File::delete(public_path().'/userfiles/thumbs/'.$image->name);
        }

        $page->delete();
    }
}
