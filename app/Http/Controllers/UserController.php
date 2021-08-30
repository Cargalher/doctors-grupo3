<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Review;
use App\Message;
class UserController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::all();
        $reviews = Review::all();
        $messages = Message::all();
        return view('home', compact('doctors','reviews','messages'));
    }

    public function messages()
    {
        $messages = Message::all();
        return view('messages', compact('messages'));
    }

    public function reviews()
    {
        
        $reviews = Review::all();
        return view('reviews', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('guest.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $doctor)
    {
        
        return view('edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $doctor)
    {

        $validate = $request->validate([
            'profile_image'=>'nullable | max:255',
            'name'=> 'required | min:3 | max:50',
            'lastname'=> 'required | min:3 | max:50',
            'city'=> 'required | max:50',
            'pv'=> 'required | max:50',
            'address'=> 'required |min:5| max:255',
            'phone_number'=> 'nullable | min:9 | max:13',
            'curriculum'=> 'nullable',
            'email' => 'required',

        ]);
        
        $doctor->update($validate);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $doctor)
    {
        $doctor->delete();

        return redirect()->route("home");
    }
}
