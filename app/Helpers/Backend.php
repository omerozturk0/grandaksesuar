<?php

namespace App\Helpers;

use Efriandika\LaravelSettings\Facades\Settings;

class Backend
{
    /**
     * Eğer modül içeriği boş ise işlem yapan fonksiyon.
     *
     * @param $module
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function ifContentNotCount($module, $onlyOwner = false)
    {
        if ($onlyOwner and !auth()->user()->hasRole('owner')) {
            alert()->warning('Bu alanda içerik bulunmamaktadır ve sizin bu kısma içerik ekleme yetkiniz yoktur.', 'Güvenlik Uyarısı!')
                ->persistent('Close');

            return redirect()->intended('admin');
        }

        return redirect()->route('admin.'.$module.'.create');
    }

    public function ifGalleryContentNotCount($module, $id)
    {
        return redirect('admin/'.$module.'/'.$id.'/gallery/upload');
    }

    /**
     * Formdan gelen her veriyi filtreleyen fonksiyon.
     *
     * @param $request
     */
    public function RequestsFilter($request)
    {
        $request->merge(array_map('strip_tags', $request->except('content', 'role', 'categories', 'attributes', 'delete_images', 'combinations', 'customergroups')));

        $request->merge(array_map('trim', $request->except('role', 'categories', 'attributes', 'delete_images', 'combinations', 'customergroups')));

        foreach ($request->all() as $name => $val) {
            $request[$name] = $val == '' ? null : $val;
        }
    }

    public function Settings($request)
    {
        foreach ($request->except('_token', '_method') as $name => $value) {
            if (isset($value) or !is_null($value)) {
                Settings::set($name, $request->get($name));
            } elseif ((!isset($value) or is_null($value)) and !is_null(Settings::get($value))) {
                Settings::forget($name);
            }
        }
    }

    public function translateCurrentLocale($item = null, $values = array(), $request = array())
    {
        $attributes = array(
            'locale' => $request->has('locale') ? $request->get('locale') : app()->getLocale(),
            'translatable_id' => $item->id,
        );

        $instance = $item->translates()->firstOrNew($attributes);
        $instance->fill($values);
        $instance->save();
    }
}
