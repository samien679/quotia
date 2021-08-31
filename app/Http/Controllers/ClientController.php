<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Quote;
use App\Http\Controllers\QuoteController;



class ClientController extends Controller
{

    /**
     * Create a new client and open a blank quote.
     *
     
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */

    public function store(StoreClientRequest $request)
    {

        $client = Client::create([
            'user_id' => Auth::user()->id,
            'client_name' => $request->client_name,
            'client_contact_person' => $request->client_contact_person,
            'client_email' => $request->client_email,
            'client_telephone' => $request->client_telephone,
            'client_address' => $request->client_address,
            'client_postal_code' => $request->client_postal_code,
            'client_city' => $request->client_city
        ]);

        $quote = Quote::create([
            'user_id' => Auth::user()->id,
            'client_id' => $client->id,
        ]);

        //session(['activequote' => $quote->id]);

        return redirect()->action(
            [QuoteController::class, 'edit'],
            ['quote' => $quote, 'client' => $client]
        );
    }
}
