<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Review;
use App\Sponsor;
use App\Message;
use App\Specialization;
use Illuminate\Support\Facades\Auth;


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
        $sponsors = Sponsor::all();

        return view('doctor.home', compact('doctors','reviews','messages','sponsors'));
    }

    public function messages()
    {
        $messages = Message::all()->reverse();
        return view('doctor.messages', compact('messages'));
    }
    
    public function reviews()
    {
        
        $reviews = Review::all()->reverse();
        return view('doctor.reviews', compact('reviews'));
    }

    public function sponsors(User $doctor)
    {
        
        $sponsors = Sponsor::all()->reverse();
        return view('doctor.sponsors', compact('doctor','sponsors'));
    }

    public function saveSponsor(Request $request , User $doctor )
    {
        $doctor->id = Auth::user()->id;
        $doctor->sponsors()->attach($request->sponsors);
        return redirect()->route('dashboard');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $doctor)
    {
        $sponsors = Sponsor::all();
        $specializations = Specialization::all();
        if (Auth::user()->id === $doctor->id ) {
            return view('doctor.edit',compact('doctor', 'specializations','sponsors'));
        } else {
            return redirect()->route("home");
           
        }
        
        return view('doctor.edit',compact('doctor', 'specializations','sponsors'));
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
            'specializations' => 'nullable',
            'service' => 'nullable',
            'sponsor'=>'nullable'
        ]);

        if (Auth::user()->id === $doctor->id ) {
            $doctor->update($validate);
        } else {
            return redirect()->route("home");
        }
        
        $doctor->specializations()->sync($request->specializations);
        $doctor->sponsors()->sync($request->sponsors);
        
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
        $doctor->specializations()->detach();
        $doctor->delete();

        return redirect()->route("home");
    }
}
