<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable  = [
        "zipcode",
        "state",
        "city",
        "street",
        "street_number",
        "client_id"
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
