<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory
};

class Translation extends Model
{
    use HasFactory;

    protected $fillable = [
        'word1_id',
        'word2_id',
    ];
}
