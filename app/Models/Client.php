<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'email',
        'cpf',
        'birthdate',
        'active',
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}
