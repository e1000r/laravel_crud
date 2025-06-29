<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Log;

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

    public function store(Request $request, Contact $contact) {
        try {
            $contact::create($request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:contacts',
                'contact' => 'required|digits:9'
            ]));

            return redirect()->route('contacts.index')
                            ->with('success', 'Contact stored successfully.');

        } catch (\Exception $e) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Failed to store contact. Please try again.');
        }
    }

    public function update(Request $request, Contact $contact)
    {
        try {
            $contact->update($request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:contacts,email,' . $contact->id,
                'contact' => 'required|digits:9'
            ]));

            return redirect()->route('contacts.index')
                            ->with('success', 'Contact updated successfully.');

        } catch (\Exception $e) {
            Log::error($e);
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Failed to update contact. Please try again.');
        }
    }

    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();

            return redirect()->route('contacts.index')
                            ->with('success', 'Contact deleted successfully.');

        } catch (\Exception $e) {
            return redirect()->back()
                            ->withInput()
                            ->with('error', 'Failed to delete contact. Please try again.');
        }
    }
}
