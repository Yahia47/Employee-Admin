<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'capital', 'currencies', 'languages', 'area'];

    protected $casts = [
        'currencies' => 'array',
        'languages' => 'array',
    ];
}
