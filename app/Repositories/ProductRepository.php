<?php

namespace App\Repositories;

use App\Helpers\Backend;
use App\Post;

class ProductRepository extends BaseRepository
{
    private $backend;
    private $galleryRepository;
    private $customergroupRepo;
    private $moduleId = 2;

    public function __construct(Post $product, Backend $backend, GalleryRepository $galleryRepository, CustomerGroupRepository $customergroupRepo)
    {
        $this->model = $product;
        $this->backend = $backend;
        $this->galleryRepository = $galleryRepository;
        $this->customergroupRepo = $customergroupRepo;
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

        $product = new $this->model();
        $product->product_code = $request->product_code;
        $product->dsc = $request->dsc;
        $product->kyw = $request->kyw;
        $product->purchase_price = $request->purchase_price;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->module_id = $this->moduleId;
        $product->is_active = $request->has('is_active');
        $product->save();

        if ($request->has('file')) {
            $this->imageUpload($request, $product);
        }

        $this->backend->translateCurrentLocale($product, $request->only('name', 'title', 'content'), $request);
        $product->categories()->sync($request->has('categories') ? $request->get('categories') : []);
        $product->attributes()->sync($request->has('attributes') ? $request->get('attributes') : []);
        $product->customergroups()->sync($request->has('customergroups') ? $request->get('customergroups') : []);
    }

    public function update($product, $request)
    {
        $this->backend->RequestsFilter($request);

        $product->product_code = $request->product_code;
        $product->dsc = $request->dsc;
        $product->kyw = $request->kyw;
        $product->purchase_price = $request->purchase_price;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->is_active = $request->has('is_active');
        $product->categories()->sync($request->has('categories') ? $request->get('categories') : []);
        $product->attributes()->sync($request->has('attributes') ? $request->get('attributes') : []);
        $product->customergroups()->sync($request->has('customergroups') ? $request->get('customergroups') : []);
        if ($request->has('file')) {
            $this->imageUpload($request, $product);
        }
        if ($request->has('default_image')) {
            foreach ($product->pictures as $picture) {
                $picture->default_image = 0;
                $picture->save();
            }

            $picture = \App\Picture::find($request->get('default_image'));
            $picture->default_image = 1;
            $picture->save();
        }
        if ($request->has('delete_images')) {
            foreach ($request->get('delete_images') as $picture) {
                $this->galleryRepository->destroy($picture);
            }
        }
        if ($request->has('combinations')) {
            $customer_id = array();
            $attr_id = array();
            foreach ($request->get('combinations') as $key => $combination) {
                $combination = explode('-', $combination);
                $customer_id[$key] = $combination[0];
                $attr_id[$key] = $combination[1];
            }
            $product->combinations()->sync([]);
            foreach ($customer_id as $key => $id) {
                $product->combinations()->attach([$id => ['attribute_id' => $attr_id[$key]]]);
            }
        }
        if (count($product->customergroups) && !$request->has('combinations')) {
            $product->combinations()->sync([]);
        }
        $product->save();

        $this->backend->translateCurrentLocale($product, $request->only('name', 'title', 'content'), $request);
    }

    public function destroy($product)
    {
        $images = $this->galleryRepository->model->where('post_id', $product->id)->get();

        foreach ($images as $image) {
            \File::delete(public_path().'/userfiles/bigs/'.$image->name);
        }
        foreach ($images as $image) {
            \File::delete(public_path().'/userfiles/images/'.$image->name);
        }
        foreach ($images as $image) {
            \File::delete(public_path().'/userfiles/thumbs/'.$image->name);
        }

        $product->delete();
    }

    public function imageUpload($request, $product)
    {
        $file = $request->file('file');
        $file_path = $file->getRealPath();
        $file_extension = $file->getClientOriginalExtension();
        $new_name = str_slug(str_random(10)).'-'.\Date::now()->format('dmyHis').'.'.str_slug($file_extension);

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

        $big_photos_width = settings('big_photos_width', 1920);
        $big_photos_height = settings('big_photos_height', 1080);
        $normal_photos_width = settings('normal_photos_width', 800);
        $normal_photos_height = settings('normal_photos_height', 600);
        $thumb_photos_width = settings('thumb_photos_width', 300);
        $thumb_photos_height = settings('thumb_photos_height', 300);

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

        $picture = new \App\Picture();
        $picture->name = $new_name;
        $picture->extension = $file_extension;
        $picture->post_id = $product->id;
        $picture->save();
    }
}
