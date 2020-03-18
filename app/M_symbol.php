<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_symbol extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $primaryKey = 'M_symbols_id';

    protected $fillable = [
        'symbol_id', 'symbol_name',
    ];
}
