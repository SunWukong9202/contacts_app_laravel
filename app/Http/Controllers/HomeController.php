<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user_id = auth()->id() ?? null;
        if($user_id) {
            $contacts = User::find($user_id)->contacts()
                ->latest()->take(9)->get() ?? null;
        } else {
            return redirect(route('login'));
        }
        //compact(...) equal to ['contacts' => $contacts]
        return view('home', compact('contacts'));
    }
}
