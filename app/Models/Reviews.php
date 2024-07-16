<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'heading',
        'rating',
        'comments',
        'email',
        'status'
    ];

}
