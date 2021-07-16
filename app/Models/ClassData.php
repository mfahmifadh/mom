<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassData extends Model
{
    use HasFactory;
    protected $table = "class";
    protected $primary_key = "id";

    protected $fillable = [
        'id',
        'user_id',
        'class_category_id', 
        'course_category',
        'class_name',
        'class_description',
        'class_member_max',
        'class_time_perday',
        'class_permonth',
        'class_cost',
        'class_status',
        'class_photo'
    ];
}

