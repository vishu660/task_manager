<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',         // या 'name' अगर आपकी टेबल में कॉलम name है
        'description',
        'user_id',
        'is_completed',  // अगर यह कॉलम भी है
    ];
}
