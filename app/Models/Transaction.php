<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $table = "cost";
    protected $primary_key = "id";

    protected $fillable = [
        'id',
        'murid_id',
        'mentor_id', 
        'booking_id',
        'transaction_date',
        'total_payment',
        'payment_status',
        'transaction_status',
        'receipt'
    ];
}
