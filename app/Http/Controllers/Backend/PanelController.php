<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class PanelController extends Controller
{
    /**
     * @return View
     */
    public function getIndex()
    {
        return view('backend.panel.index');
    }
}
