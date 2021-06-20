<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DateEtat extends Model
{
    protected $table = 'dateetats';

    protected $fillable = ['quart_id', 'user_id', 'etatquart','date_etat'];
}
