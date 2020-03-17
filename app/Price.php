<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'symbol_id', 'price', 'change', 'change_percentage', 'last_changed',
    ];
}
