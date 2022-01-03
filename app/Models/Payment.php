<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_date',
        'quantity',
        'loan_id',
        'user_id'
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

}
