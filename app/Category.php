<?php

namespace App;

use Baum\Node;
use App\Helpers\TranslatableTriat;

class Category extends Node
{
    use TranslatableTriat;

    /**
     * @var array
     */
    public $translatedAttributes = [
        'name',
        'dsc',
        'slug'
    ];

    /**
     * @var string
     */
    protected $parentColumn = 'parent_id';

    /**
     * @var string
     */
    protected $leftColumn = 'lft';

    /**
     * @var string
     */
    protected $rightColumn = 'rgt';

    /**
     * @var string
     */
    protected $depthColumn = 'depth';

    public function products()
    {
        return $this->belongsToMany('App\Post');
    }

    public function pictures()
    {
        return $this->morphMany('App\GlobalPicture', 'picturable')->with('translates');
    }
}
