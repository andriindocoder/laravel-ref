<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Company;
use App\Http\Request\ContactRequest;

class ContactController extends Controller
{

    public function __construct(){
        // $this->middleware('auth')->only('create', 'update', 'destroy');
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $companies = Company::userCompanies();
        $contacts = auth()->user()->contacts()->latestFirst()->paginate(10);

        return view('contacts.index', compact('contacts','companies'));
    }

    public function create()
    {
        $contact = new Contact();
        $companies = Company::userCompanies();

        return view('contacts.create', compact('companies', 'contact'));
    }

    public function store(ContactRequest $request) 
    {
        $request->user()->contacts()->create($request->all());

        return redirect()->route('contacts.index')->with('message', "Contact has been added");
    }

    public function edit(Contact $contact)
    {
        $companies = Company::userCompanies();

        return view('contacts.edit', compact('companies', 'contact'));
    }

    public function update(Contact $contact, ContactRequest $request) 
    {

        $contact->update($request->all());

        return redirect()->route('contacts.index')->with('message', "Contact has been updated");
    }

    public function show(Contact $contact)
    {
        // $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return back()->with('message', "Contact has been deleted");
    }
}