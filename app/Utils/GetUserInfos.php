<?php 
namespace App\Utils;

use App\Centre;
use App\Professionnel;
use App\Residence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetUserInfos
{
    static function getInfos(){
        if(Auth::user()->role=="professionnel"){
            return $user_infos = Professionnel::join('postes', 'postes.id', '=', 'professionnels.post_id')
                        ->join('users', 'users.id', '=', 'professionnels.user_id')
                        ->where('user_id',Auth::user()->id)
                        ->select(['professionnels.*','postes.*','users.*'])
                        ->first();
            //return $user_infos = Professionnel::where('user_id',Auth::user()->id)->first();
        }elseif(Auth::user()->role=="residence"){
            return $user_infos = Residence::join('users', 'users.id', '=', 'residences.resp_id')
                        ->where('resp_id',Auth::user()->id)
                        ->select(['residences.*','users.*'])
                        ->first();
        }else{
            return $user_infos = "No infos";
        }
    }

    static function getProInfos(){
        $id = Auth::user()->id;
        if(Auth::user()->role=="professionnel"){
            $infos = Professionnel::where('user_id',$id)->first();
            return $pro = Poste::find();
        }elseif(Auth::user()->role=="residence"){
            return $infos = Residence::where('resp_id',$id)->first();
        }else{
            return $infos = "No infos";
        }

    }

}