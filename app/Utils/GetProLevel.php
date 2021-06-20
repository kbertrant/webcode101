<?php 
namespace App\Utils;

use App\Centre;
use App\Professionnel;
use App\Residence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetProLevel
{
    static function getLevel($id_user){
        
        $level = Professionnel::join('postes','postes.id', '=', 'professionnels.post_id')
        ->where('professionnels.user_id',Auth::user()->id)
        ->select(['post_level'])->get();
        //dd($level[0]->post_level);

        return intval($level[0]->post_level);
    }

}