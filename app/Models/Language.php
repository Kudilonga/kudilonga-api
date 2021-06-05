<?php

namespace App\Models;

use Illuminate\Database\Eloquent\{
    Model,
    Factories\HasFactory
};

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['language_name'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
