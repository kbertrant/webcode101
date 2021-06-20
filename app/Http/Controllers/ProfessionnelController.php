<?php

namespace App\Http\Controllers;

use App\Professionnel;
use App\User;
use App\Poste;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class ProfessionnelController extends Controller
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
        $professionnels = Professionnel::join('users','users.id', '=', 'professionnels.user_id')
        ->join('postes', 'postes.id', '=', 'professionnels.post_id')
        ->select(['professionnels.id as id','name','post_name','phone','email','diplome_recent','specimen_cheque','annee_exp','dist_max','carte_identite','votre_cv','carte_rcr','attestation_pdsb','num_pratique','langue','adresse1','adresse2','ville','province','code_postal','condamnations','statut_employe'])
        ->get();
        //  dd($professionnels);
        return view('professionnel.list_professionnel',['professionnels'=>$professionnels]);
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
        $auth = Auth::user();
        if($auth->role=="professionnel" || $auth->role=="residence"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }elseif($auth->status=="desactivé"){
            return redirect()->back()->with('success', "Votre compte n'est pas activé !! Vous ne pouvez pas acceder aux ressources !!");
        }
        $professionnels = Professionnel::join('users','users.id', '=', 'professionnels.user_id')
        ->join('postes', 'postes.id', '=', 'professionnels.post_id')
        ->where('professionnels.id',$id)
        ->select(['professionnels.id as id','name','statut_employe','post_id','post_name','status','cle101','phone','email','diplome_recent','specimen_cheque','annee_exp','dist_max','carte_identite','votre_cv','carte_rcr','attestation_pdsb','num_pratique','langue','adresse1','adresse2','ville','province','code_postal','condamnations'])
        ->first();
        //dd($professionnels);
        $users = User::all();
        $postes = Poste::all();
        
        return view('professionnel.update_professionnel',compact('id','users','postes','professionnels'));
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
        $prof = Professionnel::find($request->id);

        if($request->post_id==1 || $request->post_id==2){
            if($request->carte_rcr){
                $rcr = $request->carte_rcr;
                // Get filename with the extension
                $filenameWithExt = $rcr->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $rcr->getClientOriginalExtension();
                // Filename to store
                $fileRCRToStore = $request->cle101.'_RCR.'.$extension;
                // Upload Image
                $path = $rcr->storeAs('public/carte_rcr/',$fileRCRToStore);
                $prof->carte_rcr =$fileRCRToStore;
            }else{
            }
            if($request->attestation_pdsb){
                $attestation = $request->attestation_pdsb;
                // Get filename with the extension
                $filenameWithExt = $attestation->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $attestation->getClientOriginalExtension();
                // Filename to store
                $filePDSBToStore = $request->cle101.'_PDSB.'.$extension;
                // Upload Image
                $path = $attestation->storeAs('public/attestation_pdsb/',$filePDSBToStore);
                $prof->attestation_pdsb =$filePDSBToStore;
            }else{
            }

            $request->num_pratique = "No degre";
        }else{
        }
        if($request->specimen_cheque){
            $cheque = $request->specimen_cheque;
            // Get filename with the extension
            $filenameWithExt = $cheque->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $cheque->getClientOriginalExtension();
            // Filename to store
            $fileCHEQUEToStore = $request->cle101.'_CHEQUE.'.$extension;
            // Upload Image
            $path = $cheque->storeAs('public/cheque/',$fileCHEQUEToStore);
            $prof->specimen_cheque =$fileCHEQUEToStore;
        }else{
            $fileCHEQUEToStore = "default.png";
        }

        if($request->diplome_recent){
            $diplome = $request->diplome_recent;
            // Get filename with the extension
            $filenameWithExt = $diplome->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $diplome->getClientOriginalExtension();
            // Filename to store
            $fileDIPLOMEToStore = $request->cle101.'_DIPLOME.'.$extension;
            // Upload Image
            $path = $diplome->storeAs('public/diplome/',$fileDIPLOMEToStore);
            $prof->diplome_recent =$fileDIPLOMEToStore;
        }else{
            
        }
        
        if($request->carte_identite){
            $cni = $request->carte_identite;
            // Get filename with the extension
            $filenameWithExt = $cni->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $cni->getClientOriginalExtension();
            // Filename to store
            $fileCNIToStore = $request->cle101.'_CNI.'.$extension;
            // Upload Image
            $path = $cni->storeAs('public/identification/',$fileCNIToStore);
            $prof->carte_identite =$fileCNIToStore;
        }else{
        }

        if($request->votre_cv){
            $cv = $request->votre_cv;
            // Get filename with the extension
            $filenameWithExt = $cv->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $cv->getClientOriginalExtension();
            // Filename to store
            $fileCVToStore = $request->cle101.'_CV.'.$extension;
            // Upload Image
            $path = $cv->storeAs('public/cv/',$fileCVToStore);
            $prof->votre_cv =$fileCVToStore;
        }else{
        }

        if($request->num_pratique){
            $prof->num_pratique =$request->num_pratique;
        }else{
            $prof->num_pratique = "Pas de numero";
        }
        if($request->adresse2){
            $prof->adresse2 =$request->adresse2; 
        }else{
            $prof->adresse2 = "Inconnu";
        }
            $prof->post_id =$request->post_id;
            $prof->dist_max =$request->dist_max;
            $prof->annee_exp =$request->annee_exp;
            $prof->langue =$request->langue;
            $prof->statut_employe=$request->statut_employe;
            $prof->condamnations =$request->condamnations;
            $prof->adresse1 =$request->adresse1;
            $prof->ville =$request->ville;
            $prof->province =$request->province;
            $prof->code_postal =$request->code_postal;
            $prof->save();
            //dd($prof);
            
            $user = User::find($prof->user_id);
            if($request->photo){
                $photo = $request->photo;
                // Get filename with the extension
                $filenameWithExt = $photo->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $photo->getClientOriginalExtension();
                // Filename to store
                $filePhotoToStore = $request->cle101.'_photo.'.$extension;
                // Upload Image
                $path = $photo->storeAs('public/avatars/',$filePhotoToStore);
                $user->photo = $filePhotoToStore;
            }else{
                
            }
            
            if($request->password==null){ 
            }else{
                $user->password = Hash::make($request->password);
            }
            $user->name = $request->name;
            $user->email = $request->email;
            
            $user->phone = $request->phone;
            $user->status = $request->status;
            //dd($user);
            $user->save();

        return redirect('professionnel/list')->with('success','Professionnel modifié');
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
        $professionnels = Professionnel::find($id); 
        $professionnels->delete();
      
        return redirect('professionnel/list')->with('success','Professionnel supprimé');
    }
}
