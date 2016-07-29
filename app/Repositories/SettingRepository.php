<?php

namespace App\Repositories;

use App\Helpers\Backend;

class SettingRepository extends BaseRepository
{
    private $backend;

    public function __construct(Backend $backend)
    {
        $this->backend = $backend;
    }

    public function update($request)
    {
        $this->backend->RequestsFilter($request);

        $this->backend->Settings($request);
    }
}
