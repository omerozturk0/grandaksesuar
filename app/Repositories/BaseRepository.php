<?php

namespace App\Repositories;

abstract class BaseRepository
{
    protected $model;

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function getBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }

    public function isOwner($id)
    {
        $owner = $this->model->findOrFail($id);

        if ($owner->user_id !== \Auth::user()->id) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function getByNative($native)
    {
        return $this->model->where('native', $native)->first();
    }

    public function findBySlugWithTranslation($slug)
    {
        return $this->model->whereTranslation('slug', $slug)->first();
    }
}
