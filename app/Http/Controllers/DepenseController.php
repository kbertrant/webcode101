<?php

namespace App\Http\Controllers;

use App\Tarif;
use App\Facturation;
use App\Residence;
use App\Quartdetravail;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Utils\GetResidenceId;

class DepenseController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();
        if($auth->role=="professionnel"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }elseif($auth->status=="desactivé"){
            return redirect()->back()->with('success', "Votre compte n'est pas activé !! Vous ne pouvez pas acceder aux ressources !!");
        }
        if($auth->role=="residence"){
            $depenses = Facturation::join('quartdetravails','quartdetravails.id', '=', 'facturations.quart_id')
                        ->join('postes','postes.id', '=', 'quartdetravails.post_id')
                        ->join('residences','residences.id', '=', 'quartdetravails.res_id')
                        ->join('tarifs','tarifs.post_id', '=', 'postes.id')
                        //->where('quartdetravails.res_id', '=',GetResidenceId::getId())
                        //->groupBy(DB::raw('WEEK(facturations.created_at)'))
                        ->select(['facturations.created_at','supp_nuit','heure_nuit','supp_soir','quart_etat','heure_soir','supp_jour','heure_jour','titre','jour_debut','jour_fin','res_name','post_name','heure_sup','heure_fin','heure_debut','tarif_jour','tarif_soir','tarif_nuit','facteur','temps_repas','facturation_residence'])
                        ->get();
                        //dd($facturations);
        }else{
            $depenses = Facturation::join('quartdetravails','quartdetravails.id', '=', 'facturations.quart_id')
                        ->join('postes','postes.id', '=', 'quartdetravails.post_id')
                        ->join('residences','residences.id', '=', 'quartdetravails.res_id')
                        ->join('tarifs','tarifs.post_id', '=', 'postes.id')
                        //->groupBy(DB::raw('WEEK(facturations.created_at)'))
                        ->select(['facturations.created_at','supp_nuit','heure_nuit','quart_etat','supp_soir','heure_soir','supp_jour','heure_jour','titre','jour_debut','jour_fin','res_name','post_name','heure_sup','heure_fin','heure_debut','tarif_jour','tarif_soir','tarif_nuit','facteur','temps_repas','facturation_residence'])
                        ->get();
                        //dd($facturations);
        }
        
        return view('facturation.depenses',['depenses'=>$depenses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function load_data(Request $request)
    {
        $auth = Auth::user();
        if($auth->role=="professionnel"){
            if($request->ajax())
            {
            if($request->start != '' && $request->end != '')
            {
                $data = Facturation::join('quartdetravails','quartdetravails.id', '=', 'facturations.quart_id')
                                    ->join('postes','postes.id', '=', 'quartdetravails.post_id')
                                    ->join('users','users.id', '=', 'quartdetravails.pro_id')
                                    ->join('residences','residences.id', '=', 'quartdetravails.res_id')
                                    ->join('tarifs','tarifs.post_id', '=', 'postes.id')
                                    ->whereBetween('jour_debut', array($request->start, $request->end))
                                    ->get();
            }
            else
            {
                $data = Facturation::join('quartdetravails','quartdetravails.id', '=', 'facturations.quart_id')
                                    ->join('postes','postes.id', '=', 'quartdetravails.post_id')
                                    ->join('users','users.id', '=', 'quartdetravails.pro_id')
                                    ->join('residences','residences.id', '=', 'quartdetravails.res_id')
                                    ->join('tarifs','tarifs.post_id', '=', 'postes.id')
                                    ->orderBy('jour_debut', 'desc')
                                    ->get();
            }
        echo json_encode($data);
        }
        }else{
            if($request->ajax())
            {
            if($request->start != '' && $request->end != '')
            {
                $data = Facturation::join('quartdetravails','quartdetravails.id', '=', 'facturations.quart_id')
                ->join('postes','postes.id', '=', 'quartdetravails.post_id')
                ->join('users','users.id', '=', 'quartdetravails.pro_id')
                ->join('residences','residences.id', '=', 'quartdetravails.res_id')
                ->join('tarifs','tarifs.post_id', '=', 'postes.id')
                ->whereBetween('jour_debut', array($request->start, $request->end))
                ->get();
                }
                else
                {
                $data = Facturation::join('quartdetravails','quartdetravails.id', '=', 'facturations.quart_id')
                                ->join('postes','postes.id', '=', 'quartdetravails.post_id')
                                ->join('users','users.id', '=', 'quartdetravails.pro_id')
                                ->join('residences','residences.id', '=', 'quartdetravails.res_id')
                                ->join('tarifs','tarifs.post_id', '=', 'postes.id')
                                ->orderBy('jour_debut', 'desc')
                                ->get();
                }
                echo json_encode($data);
            }
        }

    }

    public function actions(Request $request)
    {
        $actions = $request->get('generalSearch');
        $depenses = Facturation::join('quartdetravails','quartdetravails.id', '=', 'facturations.quart_id')
                            ->join('postes','postes.id', '=', 'quartdetravails.post_id')
                            ->join('users','users.id', '=', 'quartdetravails.pro_id')
                            ->join('residences','residences.id', '=', 'quartdetravails.res_id')
                            ->join('tarifs','tarifs.post_id', '=', 'postes.id')
                            ->where('quart_etat', 'like', '%'.$actions.'%')
                            ->orWhere('post_name', 'like', '%'.$actions.'%')
                            ->orWhere('res_name', 'like', '%'.$actions.'%')
                            ->paginate(5);
        //dd($request);
        return view ('facturation.depenses', ['depenses'=>$depenses]);
    }
}


