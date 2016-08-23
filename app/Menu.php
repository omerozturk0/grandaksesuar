<?php

namespace App;

use Baum\Node;
use App\Helpers\TranslatableTriat;

class Menu extends Node
{
    use TranslatableTriat;

    /**
     * @var array
     */
    public $translatedAttributes = [
        'title',
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'post_id',
        'special_url',
        'is_active',
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function page()
    {
        return $this->belongsTo('App\Post', 'post_id')->with('translates');
    }
}
