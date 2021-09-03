<?php

namespace App\Http\Controllers;

use Braintree;
use App\Http\Resources\SponsorResource;
use Illuminate\Http\Request;
use App\User;
use App\Sponsor;

class SponsorController extends Controller
{
    public function buySponsorship(User $user)
    {
        $sponsors = Sponsor::all();
        $gateway = new Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'gkjp48fbys9w4xzp',
            'publicKey' => 'y5sw5p7vbrdpg862',
            'privateKey' => 'f1f7406e833663f1e1dd3fcb92c3a7f4'
        ]);

        $token = $gateway->ClientToken()->generate();


        return view('doctor.sponsors', compact('user', 'sponsors', 'token'));
    }
}
