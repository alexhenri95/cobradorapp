<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    const CORRIENTE = 1;
    const DIFERIDO = 2;
    const DIARIO = 1;
    const SEMANAL = 2;
    const MENSUAL = 3;
    const ANUAL = 4;

    protected $fillable = [
        'code',
        'start_date',
        'end_date',
        'description',
        'payment_type',
        'quantity',
        'payments_number',
        'balance',
        'interest',
        'time',
        'final_payment',
        'customer_id',
        'user_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
