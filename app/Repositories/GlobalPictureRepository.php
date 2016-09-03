<?php

namespace App\Repositories;

use App\Helpers\Backend;
use App\GlobalPicture;

class GlobalPictureRepository extends BaseRepository
{
    private $backend;

    public function __construct(GlobalPicture $picture, Backend $backend)
    {
        $this->model = $picture;
        $this->backend = $backend;
        ini_set('memory_limit', '-1');
    }

    public function all($id, $request)
    {
        $moduleModelFileName = 'App\\'.$request->session()->get('model');
        $moduleModelFileName = new $moduleModelFileName();

        return $moduleModelFileName->find($id)->pictures;
    }

    public function upload($id, $request, $module)
    {
        $file = $request->file('file');
        $file_path = $file->getRealPath();
        $file_extension = $file->getClientOriginalExtension();
        $new_name = str_slug(str_random(10)).'-'.\Date::now()->format('dmyHis').'.'.str_slug($file_extension);

        $moduleModelFileName = 'App\\'.$request->session()->get('model');
        $moduleModelFileName = new $moduleModelFileName();

        $picture = new GlobalPicture();
        $picture->name = $new_name;
        $picture->extension = $file_extension;
        $moduleModelFileName->find($id)->pictures()->save($picture);

        $this->makeImageResizeAndUpload($file_path, $new_name);
    }

    public function editImage($img_id, $request)
    {
        $this->backend->RequestsFilter($request);
        $img = $this->getById($img_id);
        $this->backend->translateCurrentLocale($img, $request->only('title', 'dsc'), $request);
    }

    public function translateCurrentLanguage($request, $img, $lang)
    {
        $img->translateOrNew($lang)->fill($request->only('title', 'dsc'));
        $img->save();
    }

    public function destroy($img_id)
    {
        $picture = $this->getById($img_id);

        \File::delete(public_path().'/userfiles/banners/'.$picture->name);
        \File::delete(public_path().'/userfiles/bigs/'.$picture->name);
        \File::delete(public_path().'/userfiles/images/'.$picture->name);
        \File::delete(public_path().'/userfiles/thumbs/'.$picture->name);

        $picture->delete();
    }

    public function multiDelete($request)
    {
        foreach ($request->get('images') as $image) {
            \File::delete(public_path().'/userfiles/banners/'.$this->getById($image)->name);
            \File::delete(public_path().'/userfiles/bigs/'.$this->getById($image)->name);
            \File::delete(public_path().'/userfiles/images/'.$this->getById($image)->name);
            \File::delete(public_path().'/userfiles/thumbs/'.$this->getById($image)->name);
            $this->getById($image)->delete();
        }
    }

    public function makeImageResizeAndUpload($file_path, $new_name)
    {
        $bannerDestinationPath = public_path().'/userfiles/banners/';
        $BigsDestinationPath = public_path().'/userfiles/bigs/';
        $destinationPath = public_path().'/userfiles/images/';
        $thumbsDestinationPath = public_path().'/userfiles/thumbs/';

        if (!\File::exists($destinationPath)) {
            \File::makeDirectory($destinationPath);
        }
        if (!\File::exists($thumbsDestinationPath)) {
            \File::makeDirectory($thumbsDestinationPath);
        }
        if (!\File::exists($BigsDestinationPath)) {
            \File::makeDirectory($BigsDestinationPath);
        }
        if (!\File::exists($bannerDestinationPath)) {
            \File::makeDirectory($bannerDestinationPath);
        }

        $slider_photos_width = settings('slider_photos_width', 1920);
        $slider_photos_height = settings('slider_photos_height', 1080);
        $normal_photos_width = settings('normal_photos_width', 800);
        $normal_photos_height = settings('normal_photos_height', 600);
        $thumb_photos_width = settings('thumb_photos_width', 300);
        $thumb_photos_height = settings('thumb_photos_height', 200);
        $big_photos_width = settings('big_photos_width', 1920);
        $big_photos_height = settings('big_photos_height', 1080);

        // Banner
        $background = \Image::canvas($slider_photos_width, $slider_photos_height, '#ffffff');
        $img = \Image::make($file_path)->resize($slider_photos_width, $slider_photos_height, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });
        $background->insert($img, 'center');
        $background->save($bannerDestinationPath.$new_name);

        // Big
        $background = \Image::canvas($big_photos_width, $big_photos_height, '#ffffff');
        $img = \Image::make($file_path)->resize($big_photos_width, $big_photos_height, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });
        $background->insert($img, 'center');
        $background->save($BigsDestinationPath.$new_name);

        // Normal
        $background = \Image::canvas($normal_photos_width, $normal_photos_height, '#ffffff');
        $img = \Image::make($file_path)->resize($normal_photos_width, $normal_photos_height, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });
        $background->insert($img, 'center');
        $background->save($destinationPath.$new_name);

        // Thumbs
        $background = \Image::canvas($thumb_photos_width, $thumb_photos_height, '#ffffff');
        $img = \Image::make($file_path)->resize($thumb_photos_width, $thumb_photos_height, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });
        $background->insert($img, 'center');
        $background->save($thumbsDestinationPath.$new_name);
    }
}
