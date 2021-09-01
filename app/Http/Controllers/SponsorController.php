<?php

namespace App\Http\Controllers;

use App\Http\Resources\SponsorResource;
use Illuminate\Http\Request;
use App\Sponsor;
use App\User;

class SponsorController extends Controller
{
    public function index(Request $request)
    {
        $buysponsor = Sponsor::all();
        return SponsorResource::collection($buysponsor);
    }
}
