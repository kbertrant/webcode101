<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'resp_id', 'fact_id', 'res_name', 'res_phone','facture_name', 'facture_email','facture_phone', 'res_adresse1', 'res_adresse2','res_ville','res_province','res_code_postal',
        'created_at', 'updated_at','res_temps_repas'
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }
}
