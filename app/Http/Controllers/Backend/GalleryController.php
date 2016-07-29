<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Backend;
use App\Repositories\GalleryRepository;
use App\Repositories\PageRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ImageInfoRequest;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    private $backend;
    private $repository;
    private $pageRepository;

    public function __construct(Backend $backend, GalleryRepository $repository, PageRepository $pageRepository)
    {
        $this->backend = $backend;
        $this->repository = $repository;
        $this->pageRepository = $pageRepository;
    }

    public function getIndex($module, $id)
    {
        $pictures = $this->repository->all($id);

        if (!count($pictures)) {
            return $this->backend->ifGalleryContentNotCount($module, $id);
        }

        return view('backend.panel.gallery.index', compact('module', 'id', 'pictures'));
    }

    public function getUpload($module, $id)
    {
        $page = $this->pageRepository->getById($id);

        return view('backend.panel.gallery.upload', compact('module', 'id', 'page'));
    }

    public function postUpload($module, $id, Request $request)
    {
        $this->repository->upload($id, $request);
    }

    public function getEditImage($module, $id, $img_id, Request $request)
    {
        $imgInfo = $this->repository->getById($img_id);

        $languages = \LaravelLocalization::getSupportedLocales();

        if ($request->has('lang')) {
            App()->setLocale($request->get('lang'));
        }

        return view('backend.panel.gallery.edit', compact('module', 'id', 'img_id', 'imgInfo', 'languages'));
    }

    public function postEditImage($module, $id, $img_id, ImageInfoRequest $request)
    {
        $this->repository->editImage($img_id, $request);

        alert()->success(null, 'Kayıt güncellendi!');

        return redirect()->back();
    }

    public function deleteDelete($module, $id, $img_id)
    {
        $this->repository->destroy($img_id);

        return url('admin/' . $module . '/' . $id . '/gallery');
    }

    public function postMultiDelete($module, $id, Request $request)
    {
        $this->repository->multiDelete($request);

        return url('admin/' . $module . '/' . $id . '/gallery');
    }
}
