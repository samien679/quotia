<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Quote;
use App\Models\QuoteItem;

use Barryvdh\DomPDF\Facade as PDF;


class PDFController extends Controller
{
    /**

     * Generate PDF from chosen Quote number

     * @param  $quote

     * @return \Illuminate\Http\Response

     */

    public function generate($quote)
    {
        session(['activequote' => $quote]);
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $quoteInfo = Quote::findOrFail($quote);
        $quoteItems = QuoteItem::where('quote_id', $quote)->get();
        $pdf = PDF::loadView('pdf-generator', compact('quoteInfo', 'quoteItems'));
        return $pdf->stream('quote.pdf');
    }
}
