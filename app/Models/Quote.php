<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\Traits\Date;
use DateTime;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'purchase_item_id',
        'quote_item_id',
        'client_id',
        'reference1',
        'reference2'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        'due_date' => 'date:Y-m-d',
        'created' => 'date'

    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'created',
        'due_date'


    ];




    /**
     * Get the conneted purchase items.
     */
    public function purchaseItems()
    {
        return $this->hasMany(PurchaseItem::class);
    }

    /**
     * Get the conneted quote items.
     */
    public function quoteItems()
    {
        return $this->hasMany(QuoteItem::class);
    }

    /**
     * Get created_at date
     *
     * 
     * @return date
     */
    public function getCreatedAttribute()
    {

        $date = $this->created_at;

        return $date->toDateString();
    }

    /**
     * Get due date (created_at + 30d)
     *
     * 
     * @return date
     */
    public function getDueDateAttribute()
    {

        $dueDate = clone ($this->created_at->addDays(30));

        return $dueDate->toDateString();
    }

    /**
     * Get quote's total value w/o VAT
     *
     * 
     * @return float
     */
    public function getSumZeroVatAttribute()
    {

        // Hae tietokannasta aktiivisen tarjouksen tarjousrivit
        $quoteItems = QuoteItem::where('quote_id', session('activequote'))->get();

        // Kaikkien rivien loppusumman yhteenlasku
        $sumOfQuote = $quoteItems->sum('item_value');

        return $sumOfQuote;
    }

    /**
     * Get quote's total sales margin in €
     *
     * 
     * @return float
     */
    public function getSalesMarginValueAttribute()
    {

        // Hae tietokannasta aktiivisen tarjouksen tarjousrivit
        $quoteItems = QuoteItem::where('quote_id', session('activequote'))->get();

        // Kaikkien rivien loppusumman yhteenlasku
        $salesMargin = $quoteItems->sum('sales_margin_row');

        return $salesMargin;
    }
}
