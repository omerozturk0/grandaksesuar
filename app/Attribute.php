<?php

namespace App;

use Baum\Node;
use App\Helpers\TranslatableTriat;

class Attribute extends Node
{
    use TranslatableTriat;

    /**
     * @var array
     */
    public $translatedAttributes = [
        'title',
        'dsc',
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
}
