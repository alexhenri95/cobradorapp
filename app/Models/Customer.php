<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'dni',
        'name',
        'address',
        'phone',
        'email',
        'user_id'
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
