<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory
};

class Word extends Model
{
    use HasFactory;

    protected $fillable = [
        'spelling',
        'language_id',
        'description',
        'abbreviation'
    ];
}
