<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Specify which attributes can be mass-assigned
    protected $fillable = [
        'name',
        'description',
        'category',
        'image',
        'contact',
        'status',
    ];
}
