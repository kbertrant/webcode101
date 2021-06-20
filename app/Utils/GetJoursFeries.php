<?php 
namespace App\Utils;

use App\JourFerie;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetJoursFeries
{
    static function getFerie(){
        return $jours = JourFerie::all();
    }

}