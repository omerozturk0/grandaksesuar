<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\TranslatableTriat;

class Picture extends Model
{
    use TranslatableTriat;

    public $translatedAttributes = ['title', 'dsc'];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'post_id',
    ];

    /**
     * @param $query
     * @param $item
     *
     * @return mixed
     */
    public function scopePostId($query, $item)
    {
        return $query->where('post_id', $item);
    }
}
