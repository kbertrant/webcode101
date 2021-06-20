<?php 
namespace App\Utils;

use App\Poste;
use App\User;
use App\Tarif;
use App\Professionnel;
use App\Residence;
use App\Quartdetravail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetFacturation
{
    static function getHeureFin($heure_fin){
        $jour = strtotime('07:00');
        $soir = strtotime('15:00');
        $nuit = strtotime('22:00');
        $h_fin = strtotime($heure_fin);
        if($h_fin >= $jour){

        }elseif($h_fin >= $soir){

        }elseif($h_fin >= $nuit){

        }
    }

    static function getInterval($hour_start,$hour_end){
        
        $debut = strtotime($hour_start);
        $fin = strtotime($hour_end);
        $all = strtotime('24:00');
        if($hour_start<$hour_end){
            $diff = abs($debut - $fin) / 3600;
            return $diff;
        }else{
            return $diff = 8;
        }
    }

    static function getRemuneration($heure_fin,$post_id,$facteur,$heure_sup,$interval,$temps_repas){
        $poste = Poste::find($post_id);
        if($temps_repas=="30"){
            $temps='0.5';
        }elseif($temps_repas=="45"){
            $temps='0.75';
        }elseif($temps_repas=="15"){
            $temps='0.25';
        }

        $jour = strtotime('07:00');
        $soir = strtotime('15:00');
        $nuit = strtotime('22:00');
        $h_fin = strtotime($heure_fin);

        if($h_fin >= $nuit && $h_fin <= $jour){
            $taux_poste = $poste->post_tarif_nuit;
            $heure_sup_poste = $poste->post_tarif_nuit;

        }elseif($h_fin >= $jour && $h_fin <= $soir){
            $taux_poste = $poste->post_tarif_jour;
            $heure_sup_poste = $poste->post_tarif_jour;

        }elseif($h_fin >= $soir && $h_fin <= $nuit){
            $taux_poste = $poste->post_tarif_soir;
            $heure_sup_poste = $poste->post_tarif_soir;
        }
        
        return $remun = ($interval  * $facteur * $taux_poste) 
        + ($heure_sup * $facteur * $heure_sup_poste) - ($temps * $facteur * $taux_poste);
        
    }



    static function getDepense($heure_fin,$post_id,$facteur,$heure_sup,$interval,$residence_id){
        $tarif = Tarif::where('post_id','=',$post_id)->first();

        $jour = strtotime('07:00');
        $soir = strtotime('15:00');
        $nuit = strtotime('22:00');
        $h_fin = strtotime($heure_fin);
        
        if($h_fin >= $nuit && $h_fin <= $jour){
            $taux_tarif = $tarif->tarif_nuit;
            $heure_sup_tarif = $tarif->tarif_nuit;
            
        }elseif($h_fin >= $jour && $h_fin <= $soir){
            $taux_tarif = $tarif->post_tarif_jour;
            $heure_sup_tarif = $tarif->tarif_jour;
            
        }elseif($h_fin >= $soir && $h_fin <= $nuit){
            $taux_tarif = $tarif->tarif_soir;
            $heure_sup_tarif = $tarif->tarif_soir;
        }
        
        return $remun = ($interval * $facteur * $taux_tarif)+($heure_sup * $facteur * $heure_sup_tarif) ;
    }

    static function getDateFin($date_debut,$hour_start,$hour_end){
        if($hour_end > $hour_start){
            return $date_fin = $date_debut;
        }else{
            return $date_fin = date("Y-m-d",strtotime("+1 day", strtotime($date_debut)));
        }
    }

    static function getEtatQuart($pro_id){
        if($pro_id==null){
            return $quart_etat = "Disponible";
        }else{
            return $quart_etat = "Accepté";
        }
    }

    static function getFacteur($date_debut,$hour_start){
        $today = date("Y-m-d");
        $now = date('H:i');
        $timestamp = strtotime($now) + 60*60*4;
        $fin = strtotime($hour_start) ;
        $diff = abs($timestamp - $fin) / 3600;
        
        if($today == $date_debut){
            if(intval($diff)< 4){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}