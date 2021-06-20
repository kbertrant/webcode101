<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professionnel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'user_id', 'num_pratique', 'dist_max', 'annee_exp','langue','photo','carte_identite',
        'votre_cv','specimen_cheque','diplome_recent','condamnations','carte_rcr','attestation_pdsb','total_percu',
        'adresse1','adresse2','ville','province','code_postal','statut_employe'
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function Poste(){
        return $this->belongsTo('App\Poste');
    }

}
