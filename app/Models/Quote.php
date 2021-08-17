<?php

namespace App\Models;

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
}
