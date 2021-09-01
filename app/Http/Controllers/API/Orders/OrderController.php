<?php

namespace App\Http\Controllers\API\Orders;

use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Orders\OrderRequest;
use App\Sponsor;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway)
    {
        $buysponsor = Sponsor::find($request->buysponsor);

        $result = $gateway->transaction()->sale([
            'amount' => $buysponsor->price,
            'paymentMethodNonce' => $request->token,
            'option' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {

            $data = [
                'success' => true,
                'message' => "Transazione eseguita con Successo!"
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => "Transazione F A L L I T A.."
            ];
            return response()->json($data, 401);
        }
    }
}
