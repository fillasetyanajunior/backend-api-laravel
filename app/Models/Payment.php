<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'marketing_Id',
        'payment_number',
        'total_payment',
        'metode_payment',
        'kredit',
        'date_payment',
        'status',
    ];
}
