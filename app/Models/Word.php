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

    protected $hidden = [
        'created_at',
        'updated_at',
        'language_id'
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language_id');
    }
}
