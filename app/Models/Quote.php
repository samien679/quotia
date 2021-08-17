<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'

    ];

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

    /**
     * Get created_at date
     *
     * 
     * @return date
     */
    public function getCreatedAttribute()
    {

        $date = $this->created_at;

        $date->format("M-Y");
        return $date;
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

        $dueDate->format("M-Y");
        return $dueDate;
    }
}
