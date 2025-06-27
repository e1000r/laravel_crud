<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index() {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    public function create() {
        return view('contacts.create');
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function store(Request $request) {
        Contact::create($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'contact' => 'required|digits:9'
        ]));

        return redirect()->route('contacts.index')->with('success', 'Contact stored successfully.');
    }

    public function update(Request $request)
    {
        Contact::update($request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'contact' => 'required|digits:9'
        ]));

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }

}
