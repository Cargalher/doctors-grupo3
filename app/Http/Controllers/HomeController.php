<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Review;
use App\Specialization;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $doctors = User::orderBy('id', 'DESC')->paginate(10);
        $doctors = User::has('sponsors')->orderBy('updated_at')->get();
        $reviews = Review::all();
        return view('guest.homepage', compact('doctors', 'reviews'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $specializations = Specialization::all();
        $user->incrementReadCount();
        $reviews = Review::all()->reverse();
        return view('guest.show', compact('user', 'reviews', 'specializations'));
    }
}
