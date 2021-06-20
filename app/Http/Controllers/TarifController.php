<?php

namespace App\Http\Controllers;
use App\Residence;
use App\Poste;
use App\Tarif;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TarifController extends Controller
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
        if($auth->role=="professionnel" || $auth->role=="residence"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }elseif($auth->status=="desactivé"){
            return redirect()->back()->with('success', "Votre compte n'est pas activé !! Vous ne pouvez pas acceder aux ressources !!");
        }
        $tarifs = Tarif::join('residences','residences.id', '=', 'tarifs.res_id')
                        ->join('postes', 'postes.id', '=', 'tarifs.post_id')
                        //->join('professionnels', 'professionnels.id', '=', 'quartdetravails.pro_id')
                        //-> where('roles.id', '=', 12)
                        ->select(['tarifs.id','res_name','post_name','tarifs.tarif_jour','tarifs.tarif_soir','tarifs.tarif_nuit'])
                        ->get();
        
        return view('tarif.list_tarif',['tarifs'=>$tarifs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = Auth::user();
        if($auth->role=="professionnel" || $auth->role=="residence"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }elseif($auth->status=="desactivé"){
            return redirect()->back()->with('success', "Votre compte n'est pas activé !! Vous ne pouvez pas acceder aux ressources !!");
        }
        $residences = Residence::all();
        $postes = Poste::all();
        return view('tarif.create_tarif',['postes'=>$postes,'residences'=>$residences]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auth = Auth::user();
        if($auth->role=="professionnel" || $auth->role=="residence"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }elseif($auth->status=="desactivé"){
            return redirect()->back()->with('success', "Votre compte n'est pas activé !! Vous ne pouvez pas acceder aux ressources !!");
        }
        $tarifs = new Tarif();
        $tarifs->res_id = $request->res_id;
        $tarifs->post_id = $request->post_id;
        $tarifs->tarif_jour = $request->tarif_jour;
        $tarifs->tarif_soir = $request->tarif_soir;
        $tarifs->tarif_nuit = $request->tarif_nuit;

        $tarifs->save();

        
        $tarifs = Tarif::join('residences','residences.id', '=', 'tarifs.res_id')
                        ->join('postes', 'postes.id', '=', 'tarifs.post_id')
                        //->join('professionnels', 'professionnels.id', '=', 'quartdetravails.pro_id')
                        //-> where('roles.id', '=', 12)
                        ->select(['tarifs.id','res_name','post_name','tarifs.tarif_jour','tarifs.tarif_soir','tarifs.tarif_nuit'])
                        ->get();
        
        return view('tarif.list_tarif',['tarifs'=>$tarifs]);
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
        $auth = Auth::user();
        if($auth->role=="professionnel" || $auth->role=="residence"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }elseif($auth->status=="desactivé"){
            return redirect()->back()->with('success', "Votre compte n'est pas activé !! Vous ne pouvez pas acceder aux ressources !!");
        }
        $residences = Residence::all();
        $postes = Poste::all();
        $tarifs = Tarif::find($id);
        return view('tarif.update_tarif',['id'=>$id,'tarifs'=>$tarifs,'postes'=>$postes,'residences'=>$residences]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $auth = Auth::user();
        if($auth->role=="professionnel" || $auth->role=="residence"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }elseif($auth->status=="desactivé"){
            return redirect()->back()->with('success', "Votre compte n'est pas activé !! Vous ne pouvez pas acceder aux ressources !!");
        }
        DB::table('tarifs')->where('id',$request->id)->update(array(
            'res_id' =>$request->res_id,
            'post_id' =>$request->post_id,
            'tarif_jour' =>$request->tarif_jour,
            'tarif_soir' =>$request->tarif_soir,
            'tarif_nuit' =>$request->tarif_nuit,
            'created_at' =>NOW(),
            'updated_at' =>NOW()));
        return redirect('tarif/list')->with('success','Tarif modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $auth = Auth::user();
        if($auth->role=="professionnel" || $auth->role=="residence"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }elseif($auth->status=="desactivé"){
            return redirect()->back()->with('success', "Votre compte n'est pas activé !! Vous ne pouvez pas acceder aux ressources !!");
        }
        $tarifs = Tarif::find($id); 
        $tarifs->delete();
        return redirect('tarif/list')->with('success','Tarif supprimé');
    }
}
