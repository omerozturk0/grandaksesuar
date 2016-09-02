<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Backend;
use App\Repositories\GlobalPictureRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ImageInfoRequest;
use App\Http\Controllers\Controller;

class GlobalPictureController extends Controller
{
    private $backend;
    private $repository;
    private $pageRepository;

    public function __construct(Backend $backend, GlobalPictureRepository $repository)
    {
        $this->backend = $backend;
        $this->repository = $repository;
    }

    public function getIndex($module, $id, Request $request)
    {
        if ($request->has('m')) {
            $request->session()->put('model', $request->get('m'));
        }

        $pictures = $this->repository->all($id, $request);

        if (!count($pictures)) {
            return $this->backend->ifGlobalPictureContentNotCount($module, $id);
        }

        return view('backend.panel.picturable.index', compact('module', 'id', 'pictures'));
    }

    public function getUpload($module, $id)
    {
        return view('backend.panel.picturable.upload', compact('module', 'id'));
    }

    public function postUpload($module, $id, Request $request)
    {
        $this->repository->upload($id, $request, $module);
    }

    public function getEditImage($module, $id, $img_id, Request $request)
    {
        $imgInfo = $this->repository->getById($img_id);

        $languages = \LaravelLocalization::getSupportedLocales();

        if ($request->has('lang')) {
            App()->setLocale($request->get('lang'));
        }

        return view('backend.panel.picturable.edit', compact('module', 'id', 'img_id', 'imgInfo', 'languages'));
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

        return url('admin/' . $module . '/' . $id . '/pictures');
    }

    public function postMultiDelete($module, $id, Request $request)
    {
        $this->repository->multiDelete($request);

        return url('admin/' . $module . '/' . $id . '/pictures');
    }
}
