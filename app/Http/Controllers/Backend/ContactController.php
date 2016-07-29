<?php

namespace App\Http\Controllers\Backend;

use App\Contact;
use App\Repositories\ContactRepository;
use App\Http\Requests\Backend\ContactRequest;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    private $repository;

    public function __construct(ContactRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create()
    {
        return view('backend.panel.contact.create');
    }

    public function store(ContactRequest $request)
    {
        $this->repository->create($request);

        alert()->success(null, 'Kayıt eklendi!');

        return redirect('admin/settings');
    }

    public function edit(Contact $contact)
    {
        return view('backend.panel.contact.edit', compact('contact'));
    }

    public function update(Contact $contact, ContactRequest $request)
    {
        $this->repository->update($contact, $request);

        alert()->success(null, 'Kayıt güncellendi!');

        return redirect()->back();
    }

    public function destroy(Contact $contact)
    {
        $this->repository->destroy($contact);

        alert()->success(null, 'Kayıt silindi!');

        return url('admin/settings');
    }
}
