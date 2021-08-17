<?php

namespace App\Http\Controllers;

use App\Models\QuoteItem;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuoteItemRequest;

class QuoteItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a new quote item.
     *
     * @param  \App\Http\Requests\StoreQuoteItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuoteItemRequest $request)
    {

        $quoteItem = QuoteItem::create([
            'quote_id' => session('activequote'),
            'product_number' => $request->product_number,
            'name1' => $request->name1,
            'name2' => $request->name2,
            'qty' => $request->qty,
            'unit' => $request->unit,
            'quote_price' => $request->quote_price,
            'vat' => $request->vat,
            'note' => $request->note
        ]);


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuoteItem  $quoteItem
     * @return \Illuminate\Http\Response
     */
    public function show(QuoteItem $quoteItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuoteItem  $quoteItem
     * @return \Illuminate\Http\Response
     */
    public function edit(QuoteItem $quoteItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuoteItem  $quoteItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuoteItem $quoteItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuoteItem  $quoteItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuoteItem $quoteItem)
    {
        $quoteItem->delete();

        return redirect()->back();
    }
}
