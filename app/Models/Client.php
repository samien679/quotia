<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'client_name',
        'client_contact_person',
        'client_telephone',
        'client_email',
        'client_address',
        'client_postal_code',
        'client_city'
    ];

    /**
     * Get the connected quote.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
