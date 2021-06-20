<?php 
namespace App\Utils;

use App\Centre;
use App\Professionnel;
use App\Residence;
use App\Poste;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuartChevauche{

    static function mymodule_chevauche($i1_inf, $i1_sup, $i2_inf, $i2_sup) {
        $cross = false;
       
        if ($i1_inf == $i1_sup){
          $cross = true;
        }
        else {
          if ($i1_inf < $i2_inf){
              if ($i1_sup > $i2_inf){
               $cross = true;
             }
          }
      else {
              if ($i2_sup > $i1_inf){
               $cross = true;
              }
      }
        }
        return $cross;
    }

}

