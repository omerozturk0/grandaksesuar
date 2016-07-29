<?php

namespace App\Repositories;

use App\Helpers\Backend;
use App\Contact;

class ContactRepository extends BaseRepository
{
    private $backend;

    public function __construct(Contact $contact, Backend $backend)
    {
        $this->model = $contact;
        $this->backend = $backend;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create($request)
    {
        $this->backend->RequestsFilter($request);

        $contact = new Contact();
        $contact->type = $request->type;
        $contact->name = $request->name;
        $contact->val = $request->val;
        $contact->save();
    }

    public function update($contact, $request)
    {
        $this->backend->RequestsFilter($request);

        $contact->type = $request->type;
        $contact->name = $request->name;
        $contact->val = $request->val;
        $contact->save();
    }

    public function destroy($contact)
    {
        $contact->delete();
    }
}
