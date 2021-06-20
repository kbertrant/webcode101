<?php 
namespace App\Utils;

use App\Quartdetravail;
use App\Poste;
use App\Professionnel;
use App\Residence;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetAccess
{
    static function accessToQuart($user_id,$quart_id){
        $quart = Quartdetravail::find($quart_id);
        
        //test if quart exist
        if($quart==NULL){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas acces  !!");
        }else{
            $post_quart = Poste::find($quart->post_id);
        }

        if(Auth::user()->role=='residence'){
            $res_quart = Residence::find($quart->res_id);
            $res_user = Residence::where('resp_id',Auth::user()->id)->first();

            if($res_quart->id == $res_user->id){
                return false;
            }
        }elseif(Auth::user()->role=='professionnel'){
            $pro_user = Professionnel::where('user_id',Auth::user()->id)->first();
            $post_user = Poste::find($pro_user->post_id);

            if($quart->quart_etat == 'Disponible'){
                if($post_user->post_level >= $post_quart->post_level){
                    return false;
                }
            }else{
                if(Auth::user()->id == $quart->pro_id){
                    return false;
                }
            }
        }elseif(Auth::user()->role=='edimestre' || Auth::user()->role=='administrateur'){
            return false;
        }
        return true;
        
    }

}