<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteItem extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'item_value' => 'float',
        'item_value_with_vat' => 'decimal:2'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quote_id',
        'product_number',
        'name1',
        'name2',
        'qty',
        'unit',
        'purchase_price',
        'quote_price',
        'vat',
        'supplier',
        'note'
    ];

    /**
     * Get the connected quote.
     */
    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    /**
     * Get the sales value (qty * price) of item
     *
     * 
     * @return float
     */
    public function getItemValueAttribute()
    {
        $itemValue = $this->qty * $this->quote_price;
        return number_format($itemValue, 2);
    }

    /**
     * Get the sales value (qty * price) of item, including alv
     *
     * 
     * @return float
     */
    public function getItemValueWithVatAttribute()
    {
        $vat = $this->vat / 100 + 1;

        return $vat * $this->quote_price * $this->qty;
    }

    /**
     * Get sales margin in €
     *
     * 
     * @return float
     */
    public function getSalesMarginAttribute()
    {
        $margin =  $this->quote_price - $this->purchase_price;

        return number_format($margin, 2);
    }

    /**
     * Get sales margin in €, multiplied by quantity.
     *
     * 
     * @return float
     */
    public function getSalesMarginRowAttribute()
    {
        $margin =  $this->sales_margin * $this->qty;

        return number_format($margin, 2);
    }


    /**
     * Get sales margin in %
     *
     * 
     * @return float
     */
    public function getSalesMarginPercentageAttribute()
    {
        $margin =  ($this->sales_margin / $this->quote_price) * 100;

        return number_format($margin, 2);
    }

    /**
     * Get purchase price with 2 decimals
     *
     * 
     * @return float
     */
    public function getPurchasePriceDecimalsAttribute()
    {
        $price =  $this->purchase_price;

        return number_format($price, 2);
    }

    /**
     * Get quote price with 2 decimals
     *
     * 
     * @return float
     */
    public function getQuotePriceDecimalsAttribute()
    {
        return number_format($this->quote_price, 2);
    }
}
