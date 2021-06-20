<?php 
namespace App\Utils;

use App\Centre;
use App\User;
use App\Poste;
use App\Quartdetravail;
use App\Utils\GetResidenceId;
use App\Utils\GetProLevel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetQuartByRole
{
    static function getQuart($role){
        
        if($role == "professionnel"){
            
            $disp = 'Disponible';
            
            //return $quart = Quartdetravail::where('quart_etat', '=',$disp)->get();
            return $quart = Quartdetravail::join('postes','postes.id', '=', 'quartdetravails.post_id')
                        ->join('residences', 'residences.id', '=', 'quartdetravails.res_id')
                        ->join('users', 'users.id', '=', 'quartdetravails.pro_id')
                        ->where('quart_etat','=',$disp)
                        ->where('pro_id','=',Auth::user()->id)
                        ->select([DB::raw('COUNT(quartdetravails.id) as nbre_quart'),'quartdetravails.id as quart_id','res_name','pro_id','facteur','titre','departement','quart_etat','post_name','jour_debut','heure_debut','heure_fin'])
                        ->get();   
                        //dd($quart);
        }elseif($role=="residence"){
            //return $quart = Quartdetravail::where('res_id', '=', GetResidenceId::getId())->get();
            return $quart = Quartdetravail::join('postes','postes.id', '=', 'quartdetravails.post_id')
                        ->join('residences', 'residences.id', '=', 'quartdetravails.res_id')
                        //->join('users', 'users.id', '=', 'quartdetravails.pro_id')
                        ->where('res_id', '=', GetResidenceId::getId())
    
                        ->select([DB::raw('COUNT(quartdetravails.id) as nbre_quart'),'quartdetravails.id as quart_id','res_name','facteur','titre','quart_etat','departement','post_name','jour_debut','heure_debut','heure_fin'])
                        ->get(); 
                //dd($quart);        
        }else{
            //return $quart = Quartdetravail::all();
            return $quart = Quartdetravail::join('postes','postes.id', '=', 'quartdetravails.post_id')
                        ->join('residences', 'residences.id', '=', 'quartdetravails.res_id')
                        //->join('users', 'users.id', '=', 'quartdetravails.pro_id')
                        //-> where('roles.id', '=', 12)
                        ->select([DB::raw('COUNT(quartdetravails.id) as nbre_quart'),'quartdetravails.id as quart_id','res_name','facteur','titre','quart_etat','departement','post_name','jour_debut','heure_debut','heure_fin'])
                        ->get();
        }
        
    }


    static function getQuartForCalendar($role,$start,$end){
        $user_id = Auth::user()->id;
        if($role == "professionnel"){
            $level = GetProLevel::getLevel(Auth::user()->id);
            $disp = 'Disponible';
            $user_id = Auth::user()->id;
            
            return $quart = Quartdetravail::join('postes','postes.id', '=', 'quartdetravails.post_id')
                        ->join('residences', 'residences.id', '=', 'quartdetravails.res_id')
                        ->where(function ($query) use ($level, $disp,$user_id) {
                            $query->where('post_level','<=',$level)->where('quart_etat','=',$disp);
                        })->orwhere('pro_id','=',$user_id)
                        ->select(['quartdetravails.id as id','res_name as description','post_level','facteur','departement','titre','quart_etat','post_name as title','jour_debut as start','jour_fin as end','heure_debut','heure_fin'])
                        ->get();
                        //dd($quart);
        }elseif($role=="residence"){
            $res_id = GetResidenceId::getId();
            $mask = "non";
            $query = 'SELECT quartdetravails.id as id,pro_id,name,
            facteur,mask_residence,departement,titre,quart_etat,post_name as title,
            jour_debut as start,jour_fin as end,heure_debut,heure_fin
            FROM quartdetravails 
            LEFT JOIN users ON users.id = quartdetravails.pro_id
            INNER JOIN postes ON postes.id = quartdetravails.post_id
            RIGHT JOIN residences ON residences.id = quartdetravails.res_id
            WHERE res_id = '.$res_id.' OR pro_id = NULL
            WHERE jour_debut BETWEEN '.$request->start.' AND '.$request->end.'';

            $well = DB::SELECT($query); 
            return $obj = collect($well);
                       
        }else{
            
            $query = 'SELECT quartdetravails.id as id,res_name as description,pro_id,name,
            facteur,mask_residence,departement,titre,quart_etat,post_name as title,
            jour_debut as start,jour_fin as end,heure_debut,heure_fin
            FROM quartdetravails 
            LEFT JOIN users ON users.id = quartdetravails.pro_id
            INNER JOIN postes ON postes.id = quartdetravails.post_id
            RIGHT JOIN residences ON residences.id = quartdetravails.res_id';

            $well = DB::SELECT($query); 
            return $obj = collect($well);
        }
        
    }

    

}