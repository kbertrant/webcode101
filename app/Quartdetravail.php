<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quartdetravail extends Model
{
    protected $fillable = ['post_id', 'res_id', 'pro_id', 'titre', 'jour_debut', 'jour_fin', 'heure_debut', 'heure_fin',
        'heure_sup', 'quart_etat', 'commentaires', 'mask_residence','note', 'facteur','departement','temps_repas', 'created_at', 'updated_at'];

        public function Residence(){
            return $this->belongsTo('App\Residence');
        }
       
        public function Professionnel(){
            return $this->belongsTo('App\Professionnel');
        }

        public function Poste(){
            return $this->belongsTo('App\Poste');
        }

        public function User(){
            return $this->belongsTo('App\User');
        }
}
