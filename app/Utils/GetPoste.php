<?php 
namespace App\Utils;

use App\Centre;
use App\Professionnel;
use App\Residence;
use App\Poste;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetPoste
{
    static function getPosteName($poste_id){
        $poste = Poste::find($poste_id);
        return $poste->post_name;
    }


    static function getPosteLevel($poste_id){
        $poste = Poste::find($poste_id);
        return $poste->post_level;
    }

    static function getListPro($poste_id,$post_level){
       
         $list_user_id = Professionnel::join('postes','postes.id', '=', 'professionnels.post_id')
                        ->where('professionnels.post_id', '=', $poste_id)
                        ->where('postes.post_level', '>=', $post_level)
                        ->select(['user_id'])
                        ->get();
        $users = [];
        $s = 0;
        foreach ($list_user_id as $p) {
            $i = $s++;
            $user = User::findOrFail($list_user_id[$i]->user_id);
            array_push($users, $user);
        }
        dd($users);
        return $users;              
    }

    static function getListEmail($list_user_id){
        
       
       
        return $list_pro = Professionnel::join('postes','postes.id', '=', 'professionnels.post_id')
                        ->where('professionnels.post_id', '=', $poste_id)
                        ->where('postes.post_level', '>=', $post_level)
                        ->select(['user_id'])
                        ->get();
                        //dd($list_pro[0]->user_id);
    }

}