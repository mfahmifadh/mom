<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = "booking";
    protected $primary_key = "id";

    protected $fillable = [
        'id',
        'murid_id',
        'class_id', 
        'class_progress',
        'class_status',
        'start_date',
        'end_date'
    ];
}
