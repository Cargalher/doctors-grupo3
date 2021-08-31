<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Review;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $doctors = User::orderBy('id', 'DESC')->paginate(10);

        $reviews = Review::all();
        return view('guest.homepage', compact('doctors','reviews'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $reviews = Review::all()->reverse();
        return view('guest.show', compact('user', 'reviews'));
    }
}
