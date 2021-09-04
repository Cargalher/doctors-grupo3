<?php

namespace App\Http\Controllers;

use Braintree;
use Illuminate\Http\Request;
use App\User;
use App\Sponsor;

class PaymentController extends Controller
{
    public function checkout(Request $request, User $user)
    {
        $gateway = new Braintree\Gateway([

            'environment' => 'sandbox',
            'merchantId' => 'gkjp48fbys9w4xzp',
            'publicKey' => 'y5sw5p7vbrdpg862',
            'privateKey' => 'f1f7406e833663f1e1dd3fcb92c3a7f4'

        ]);

        $amount = $request->amount;
        // $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            date_default_timezone_set('Europe/Rome');
            $date = date("Y-m-d H:i:s");
            $sponsor = Sponsor::all()->where('price', $request->amount)->first();
            $sponId = $sponsor->id;
            $thedate = strtotime($date . ' + ' . $sponsor->duration . 'day');
            $expirationDate = date('Y-m-d H:i:s', $thedate);
            $user->sponsors()->attach($sponId, ['expiration_time' => $expirationDate]);
            return back()->with('success_message', 'Il pagamento è  avvenuto con successo.');
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            return back()->withErrors('Ops, c\'è stato un errore durante il pagamento. Riprova.');
        }
    }
}
