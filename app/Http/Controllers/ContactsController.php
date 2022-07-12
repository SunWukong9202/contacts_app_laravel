<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contacts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $user_id = auth()->id() ?? null;
        if($user_id) {
            $contacts = User::find($user_id)->contacts()
                ->orderBy('name', 'desc')->paginate(6) ?? null;
        } else {
            return redirect(route('login'));
        }
        
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        $contact = $request->validated();
        if($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profiles', 'public');
            $contact['profile_picture'] = $path;
        }
        $contact['user_id'] = $request->user()->id;

        Contacts::create($contact);
        // auth()->user()->contacts()->create($contact);

        return redirect('home')->with('alert',[
            'message' => "Contact {$contact['name']} Successfully saved.",
            'type' => 'success'
         ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function show(Contacts $contact)
    {
        $this->authorize('view', $contact);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacts $contact)
    {
        $this->authorize('update', $contact);

        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContactRequest $request, Contacts $contact)
    {
        $this->authorize('update', $contact);

        $data = $request->validated();

        if($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profiles', 'public');
            $contact['profile_picture'] = $path;
        }

        $contact->update($data);
        return redirect()->route('home')->with('alert',[
            'message' => "Contact {$data['name']} Successfully updated.",
            'type' => 'success'
         ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contacts  $contacts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacts $contact)
    {
        $this->authorize('delete', $contact);

        $contact->delete();
        return back()->with('alert',[
            'message' => "Contact $contact->name Successfully deleted.",
            'type' => 'success'
         ]);
    }
}
