<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $doctors = User::all();
        return view('guest.homepage', compact('doctors'));
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
}
