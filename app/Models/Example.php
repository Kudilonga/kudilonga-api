<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory
};

class Example extends Model
{
    use HasFactory;

    protected $fillable = [
        'word_id',
        'description'
    ];
}
