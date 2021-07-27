<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

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
        'supplier'

    ];

    /**
     * Get the connected quote.
     */
    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }
}
