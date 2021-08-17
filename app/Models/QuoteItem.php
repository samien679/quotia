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
        'item_value' => 'float'
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
        'quote_price',
        'vat',
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
        return $this->qty * $this->quote_price;
    }
}
