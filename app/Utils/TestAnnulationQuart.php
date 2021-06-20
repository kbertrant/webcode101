<?php 
namespace App\Utils;

use App\Centre;
use App\Quartdetravail;
use App\DateEtat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestAnnulationQuart
{
    static function getTestAnnulation($quart_id){
        
        $annulation = DateEtat::join('quartdetravail','quartdetravail.id', '=', 'dateetats.quart_id')
        ->where('quart_id',$quart_id)
        ->where('quart_etat','Accepté')
        ->select(['post_level'])->first();
        
        if($annulation){
            return true;
        }else{
            return false;
        }
    }

}