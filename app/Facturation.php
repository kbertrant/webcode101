<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturation extends Model
{
    protected $fillable = ['quart_id', 'facturation_residence', 'remuneration_pro', 'heure_jour', 'supp_jour'
    , 'heure_soir', 'supp_soir', 'heure_nuit', 'supp_nuit'];
}
