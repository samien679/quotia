<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Quote;
use App\Models\PurchaseItem;
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
            [QuoteController::class, 'purchaseEdit'],
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
     * Show the view for editing the specified quotes purchase items.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function purchaseEdit($id)
    {
        session(['activequote' => $id]);

        $purchaseItems = PurchaseItem::all()->where('quote_id', $id);

        return view('purchase-edit', compact('purchaseItems'));
    }

    /**
     * Show the view for editing the specified quotes quote/sales items.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function salesEdit($id)
    {
        session(['activequote' => $id]);

        // Hae tietokannasta aktiivisen tarjouksen kulurivit
        $purchaseItems = PurchaseItem::where('quote_id', $id)->get();

        // Hae tietokannasta aktiivisen tarjouksen tarjousrivit
        $quoteItems = QuoteItem::where('quote_id', $id)->get();

        // Kaikkien rivien loppusumman yhteenlasku
        $sumOfQuote = $quoteItems->sum('item_value');

        return view('sales-edit', compact('purchaseItems', 'quoteItems', 'sumOfQuote'));
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
