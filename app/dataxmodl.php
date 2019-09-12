<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dataxmodl extends Model
{
    protected $table='datax';
    protected $fillable=[
        'name',
        'stock'
    ];
}
