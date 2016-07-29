<?php

namespace App\Repositories;

use App\Helpers\Backend;
use App\StaticContent;

class StaticRepository extends BaseRepository
{
    private $backend;

    public function __construct(StaticContent $static, Backend $backend)
    {
        $this->model = $static;
        $this->backend = $backend;
    }

    public function allPaginate()
    {
        return $this->model->with('translates')->paginate(10);
    }

    public function all()
    {
        return $this->model->where('is_active', 1)->with('translates')->get();
    }

    public function native($native = null)
    {
        if (\Cache::has($native)) {
            return \Cache::get($native);
        }

        if ($static = $this->findNative($native)) {
            return $this->makeCache($static->native);
        }
    }

    public function create($request)
    {
        $this->backend->RequestsFilter($request);

        $static = new $this->model();
        $static->native = $request->native;
        $static->is_active = $request->has('is_active');
        $static->save();

        $this->backend->translateCurrentLocale($static, $request->only('title', 'content'), $request);
        $this->deleteCache($static->native);
        $this->makeCache($static->native);
    }

    public function update($static, $request)
    {
        $this->backend->RequestsFilter($request);

        $static->native = $request->native;
        $static->is_active = $request->has('is_active');
        $static->save();

        $this->backend->translateCurrentLocale($static, $request->only('title', 'content'), $request);
        $this->deleteCache($static->native);
        $this->makeCache($static->native);
    }

    public function destroy($static)
    {
        $this->deleteCache($static->native);
        $static->delete();
    }

    public function makeCache($native = null)
    {
        return \Cache::rememberForever($native, function () use ($native) {
            return $this->findNative($native);
        });
    }

    public function deleteCache($native = null)
    {
        return \Cache::forget($native);
    }

    public function findNative($native = null)
    {
        return $this->model->where('native', $native)->where('is_active', 1)->with('translates')->first();
    }
}
