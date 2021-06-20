<?php 
namespace App\Utils;

class CalculQuart{

    static function getCalculQuart($heure_debut,$heure_fin){

        $nb_heures_jour = "nombre d'heures du quart de travail compris dans la période de jour";
        $nb_heures_soir = "nombre d'heures du quart de travail compris dans la période de soir";
        $nb_heures_nuit = "nombre d'heures du quart de travail compris dans la période de nuit";
        
        if ($nb_heures_jour == max($nb_heures_jour, $nb_heures_soir, $nb_heures_nuit)) {
            $nb_heures_jour = $nb_heures_jour - $temps_de_repas;
            if (2 >= $nb_heures_soir + $nb_heures_nuit) {
                $nb_heures_jour += $nb_heures_soir + $nb_heures_nuit;
                $nb_heures_soir = 0;
                $nb_heures_nuit = 0;
            }
        }
        else {
            if ($nb_heures_soir == max($nb_heures_jour, $nb_heures_soir, $nb_heures_nuit)) {
                $nb_heures_soir = $nb_heures_soir - $temps_de_repas/60;
                if (2 >= $nb_heures_jour + $nb_heures_nuit) {
                $nb_heures_soir += $nb_heures_jour + $nb_heures_nuit;
                $nb_heures_jour = 0;
                $nb_heures_nuit = 0;
                }
            }
            else {
                $nb_heures_nuit = $nb_heures_nuit - $temps_de_repas/60;
                if (2 >= $nb_heures_jour + $nb_heures_soir) {
                $nb_heures_nuit += $nb_heures_jour + $nb_heures_soir;
                $nb_heures_jour = 0;
                $nb_heures_soir = 0;
                }
            }   
        }
    }
    
}