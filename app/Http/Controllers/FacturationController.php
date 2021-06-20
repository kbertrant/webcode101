<?php

namespace App\Http\Controllers;

use DB;
use App\Tarif;
use App\Facturation;
use App\Residence;
use App\Quartdetravail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacturationController extends Controller
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
        if($auth->role=="residence"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }elseif($auth->status=="desactivé"){
            return redirect()->back()->with('success', "Votre compte n'est pas activé !! Vous ne pouvez pas acceder aux ressources !!");
        }
        if($auth->role=="professionnel"){
            $facturations = Facturation::join('quartdetravails','quartdetravails.id', '=', 'facturations.quart_id')
                        ->join('postes','postes.id', '=', 'quartdetravails.post_id')
                        ->join('residences','residences.id', '=', 'quartdetravails.res_id')
                        ->join('tarifs','tarifs.post_id', '=', 'postes.id')
                        ->where('quartdetravails.pro_id', '=', Auth::user()->id)
                        //->groupBy(DB::raw('WEEK(facturations.created_at)'))
                        ->select(['facturations.created_at','supp_nuit','quart_etat','heure_nuit','supp_soir','heure_soir','supp_jour','heure_jour','titre','jour_debut','jour_fin','heure_debut','post_tarif_nuit','post_tarif_soir','heure_sup','res_name','post_name','heure_fin','facteur','temps_repas','remuneration_pro','post_tarif_jour'])
                        ->get();
        }else{
            $facturations = Facturation::join('quartdetravails','quartdetravails.id', '=', 'facturations.quart_id')
                        ->join('postes','postes.id', '=', 'quartdetravails.post_id')
                        ->join('residences','residences.id', '=', 'quartdetravails.res_id')
                        ->join('tarifs','tarifs.post_id', '=', 'postes.id')
                        //->groupBy(DB::raw('WEEK(facturations.created_at)'))
                        ->select(['facturations.created_at','supp_nuit','quart_etat','heure_nuit','supp_soir','heure_soir','supp_jour','heure_jour','titre','jour_debut','jour_fin','heure_debut','post_tarif_nuit','post_tarif_soir','heure_sup','res_name','post_name','heure_fin','facteur','temps_repas','remuneration_pro','post_tarif_jour'])
                        ->get();
        }
        
                        //dd($facturations);
        //$facturations = Facturation::all();
        return view('facturation.facture',['facturations'=>$facturations]);
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

    function fetch_data(Request $request)
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
            ->where('quartdetravails.pro_id', '=', Auth::user()->id)
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
            ->where('quartdetravails.pro_id', '=', Auth::user()->id)
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
            //->where('quartdetravails.pro_id', '=', Auth::user()->id)
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
            //->where('quartdetravails.pro_id', '=', Auth::user()->id)
            ->orderBy('jour_debut', 'desc')
            ->get();
            }
            echo json_encode($data);
            }
        }
    }
    
}
