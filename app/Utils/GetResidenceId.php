<?php 
namespace App\Utils;

use App\Centre;
use App\Residence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetResidenceId
{
    static function getId(){
        
       
        $user_infos = Residence::where('resp_id',Auth::user()->id)->first();
        if($user_infos){
            
        }else{
            $user_infos = Residence::where('fact_id',Auth::user()->id)->first();
            return $user_infos->id;
        }
        return $user_infos->id;
        
       
    }

    static function getResponsableId($res_id){

        $user_infos = Residence::find($res_id)->first();
        if($user_infos->resp_id){
            
        }else{
            return $user_infos->fact_id;
        }
        return $user_infos->resp_id;
        
    }

    static function getResidenceName(){
        $user_infos = Residence::where('resp_id',Auth::user()->id)->first();
        if($user_infos){
            
        }else{
            $user_infos = Residence::where('fact_id',Auth::user()->id)->first();
            return $user_infos->res_name;
        }
        return $user_infos->res_name;
    }

    static function getResidenceNameById($id){
        $res = Residence::find($id);
        
        return $res->res_name;
    }

}