<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\TranslatableTriat;

class Post extends Model
{
    use Taggable;
    use TranslatableTriat;

    /**
     * @var array
     */
    protected $translatedAttributes = ['name', 'slug', 'title', 'content'];

    /**
     * @var array
     */
    protected $fillable = [
        'kyw',
        'dsc',
        'is_static',
        'has_slider',
        'is_active',
    ];

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }

    /**
     * @param $query
     * @param $id
     *
     * @return mixed
     */
    public function scopeModule($query, $id)
    {
        return $query->where('module_id', $id);
    }

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pictures()
    {
        return $this->hasMany('App\Picture')->orderBy('default_image', 'desc')->with('translates');
    }

    public function attributes()
    {
        return $this->belongsToMany('App\Attribute')->where('is_active', 1)->orderBy('lft')->with('translates', 'children');
    }

    public function attributesNotRoots($parent)
    {
        return $this->belongsToMany('App\Attribute')->orderBy('lft')->where('parent_id', '!=', null)->where('parent_id', $parent)->with('translates');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category')->with('translates');
    }

    public function customergroups()
    {
        return $this->belongsToMany('App\CustomerGroup')->where('is_active', 1)->with('combinations', 'translates');
    }

    public function combinations()
    {
        return $this->belongsToMany('App\CustomerGroup', 'posts_customer_groups_attributes', 'post_id', 'customer_group_id')->withPivot('attribute_id')->with('translates');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
