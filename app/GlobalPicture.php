<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\TranslatableTriat;

class GlobalPicture extends Model
{
    use TranslatableTriat;

    public $translatedAttributes = ['title', 'dsc'];

    public function picturable()
    {
        return $this->morphTo();
    }
}
