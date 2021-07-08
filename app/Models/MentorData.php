<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorData extends Model
{
    use HasFactory;
    protected $table = "mentor_data";
    protected $primary_key = "id";

    protected $fillable = [
        'id','user_id','about', 'education_history','experience','skill','portfolio','certificate','status_account'
    ];
}
