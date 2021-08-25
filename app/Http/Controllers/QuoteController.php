<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quote;
use App\Models\QuoteItem;


class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::all()->where('user_id', Auth::user()->id);

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quote = Quote::create([
            'user_id' => Auth::user()->id
        ]);

        session(['activequote' => $quote->id]);

        return redirect()->action(
            [QuoteController::class, 'edit'],
            ['quote' => $quote->id]
        );
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        session(['activequote' => $id]);

        $quoteItems = QuoteItem::where('quote_id', $id)->get();

        // Kaikkien rivien loppusumman yhteenlasku
        $sumOfQuote = $quoteItems->sum('sales_value');

        return view('edit', compact('quoteItems', 'sumOfQuote'));
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
