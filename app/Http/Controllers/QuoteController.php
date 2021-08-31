<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quote;
use App\Models\QuoteItem;
use App\Models\Client;
use App\Http\Controllers\ClientController;



class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $quotes = Quote::where('user_id', Auth::user()->id)->get();

        return view('dashboard', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard');
    }

    /**
     * Create a new quote and persist it in storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function store($client)
    {
        // SIIRRETTY Clientcontrolleriin 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the view for editing the specified quotes items.
     * @param  int  $id
     * @param  int  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        session(['activequote' => $id]);

        $quoteItems = QuoteItem::where('quote_id', $id)->get();

        $quote = Quote::find($id);

        return view('edit', compact('quoteItems', 'quote'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
