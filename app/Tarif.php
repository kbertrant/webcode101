<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $fillable = ['res_id', 'post_id', 'tarif_jour', 'tarif_soir', 'tarif_nuit', 'created_at', 'updated_at'];

    public function Residence(){
        return $this->belongsTo('App\Residence');
    }

    public function Poste(){
        return $this->belongsTo('App\Poste');
    }
}
