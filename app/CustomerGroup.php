<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\TranslatableTriat;

class CustomerGroup extends Model
{
    use TranslatableTriat;

    /**
     * @var array
     */
    public $translatedAttributes = [
        'title',
        'dsc',
    ];

    public function combinations()
    {
        return $this->belongsToMany('App\Attribute', 'posts_customer_groups_attributes', 'customer_group_id', 'attribute_id')->where('is_active', 1)->with('translates', 'children');
    }
}
