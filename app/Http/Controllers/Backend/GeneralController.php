<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    public function download($img)
    {
        $path = public_path() . '/userfiles/images/' . $img;

        return \Response::download($path);
    }
}
