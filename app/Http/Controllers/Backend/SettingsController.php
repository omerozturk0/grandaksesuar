<?php

namespace App\Http\Controllers\Backend;

use App\Repositories\ContactRepository;
use App\Repositories\SettingRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    private $repository;
    private $contactRepository;

    public function __construct(SettingRepository $repository, ContactRepository $contactRepository)
    {
        $this->repository = $repository;
        $this->contactRepository = $contactRepository;
    }

    public function getIndex()
    {
        $contacts = $this->contactRepository->all();

        return view('backend.panel.settings.general', compact('contacts'));
    }

    public function postIndex(Request $request)
    {
        $this->repository->update($request);

        alert()->success(null, 'Kayıt güncellendi!');

        return redirect()->back();
    }
}
