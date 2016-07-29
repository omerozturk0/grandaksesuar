<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Backend;
use App\Attribute;
use App\Repositories\AttributeRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\AttributeRequest;
use App\Http\Controllers\Controller;

class AttributeController extends Controller
{
    private $backend;
    private $attributeRepository;

    public function __construct(Backend $backend, AttributeRepository $attributeRepository)
    {
        $this->backend = $backend;
        $this->attributeRepository = $attributeRepository;
    }

    public function index()
    {
        $attributes = $this->attributeRepository->allRoots();

        if (!count($attributes)) {
            return $this->backend->ifContentNotCount('attribute', true);
        }

        return view('backend.panel.attribute.index', compact('attributes'));
    }

    public function create(Request $request)
    {
        $attributes = $this->attributeRepository->allWithHierarchy();

        if ($request->has('parent')) {
            $parent = $request->get('parent');
        }

        return view('backend.panel.attribute.create', compact('attributes', 'parent'));
    }

    public function store(AttributeRequest $request)
    {
        $this->attributeRepository->create($request);

        alert()->success(null, 'Kayıt eklendi!');

        return redirect()->route('admin.attribute.index');
    }

    public function edit(Attribute $attribute, Request $request)
    {
        $attributes = $this->attributeRepository->notSelfWithHierarchy($attribute);

        $languages = \LaravelLocalization::getSupportedLocales();

        if ($request->has('lang')) {
            App()->setLocale($request->get('lang'));
        }

        return view('backend.panel.attribute.edit', compact('attribute', 'languages', 'attributes'));
    }

    public function update(AttributeRequest $request, Attribute $attribute)
    {
        $this->attributeRepository->update($attribute, $request);

        alert()->success(null, 'Kayıt güncellendi!');

        return redirect()->back();
    }

    public function destroy(Attribute $attribute)
    {
        $this->attributeRepository->destroy($attribute);

        alert()->success(null, 'Kayıt silindi!');

        return route('admin.attribute.index');
    }

    public function getChild(Attribute $attribute)
    {
        $attributes = $this->attributeRepository->getChild($attribute);

        if (!count($attributes)) {
            return redirect('admin/attribute/create?parent=' . $attribute->id);
        }

        return view('backend.panel.attribute.index', compact('attributes', 'attribute'));
    }
}
