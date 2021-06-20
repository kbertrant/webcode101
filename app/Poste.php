<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    protected $fillable = ['post_name', 'post_level', 'post_tarif_jour', 'post_tarif_soir', 'post_tarif_nuit', 'created_at', 'updated_at'];
}
