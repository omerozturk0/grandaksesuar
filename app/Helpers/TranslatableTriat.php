<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Builder;

/**
 * Modüllerin çeviri işlemlerindeki veri tabanı fonksiyonları.
 */
trait TranslatableTriat
{
    public function translates()
    {
        return $this->morphMany('App\Translation', 'translatable');
    }

    public function translated($locale = null)
    {
        $locale = $this->locale($locale);

        return $this->translates->where('locale', $locale)->first();
    }

    public function getAttribute($key)
    {
        if (in_array($key, $this->translatedAttributes)) {
            if ($this->translated() === null) {
                return $this->translated('tr')->$key;
            }

            return $this->translated()->$key;
        }

        return parent::getAttribute($key);
    }

    public static function boot()
    {
        parent::boot();

        static::deleted(function ($model) {
            $model->translates()->delete();
        });
    }

    public function scopeWhereTranslation(Builder $query, $key, $value)
    {
        return $query->whereHas('translates', function (Builder $query) use ($key, $value) {
            $query->where($key, $value);
        });
    }

    public function locale($locale = null)
    {
        return is_null($locale) ? app()->getLocale() : $locale;
    }
}
