<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\TranslatableTriat;

class StaticContent extends Model
{
    use TranslatableTriat;

    /**
     * @var array
     */
    public $translatedAttributes = [
        'title',
        'content',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'is_active',
    ];

    /**
     * @param $query
     * @param $native
     *
     * @return mixed
     */
    public function scopeNative($query, $native)
    {
        return $query->where('native', $native);
    }
}
