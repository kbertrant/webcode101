<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Utils\GetUserInfos;
use App\Utils\GetResidenceId;
use App\Utils\GetQuartByRole;
use App\Quartdetravail;
use App\User;
use App\Poste;
use App\Professionnel;
use Illuminate\Support\Facades\Storage;
use Redirect,Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->first_auth==true){
            $user =Auth::user();
            return view('user.change',compact('user'));
        }else{
            $role = Auth::user()->role;
            $quart = GetQuartByRole::getQuart(Auth::user()->role);
                //dd($quart);
        return view('home',compact('quart','role'));
        }
        
    }


    /**
     * Get transfers list of the user !
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData(Request $request)
    {
        if($request->ajax())
        {
            if($request->start != '' && $request->end != '')
            {
               $data = Quartdetravail::join('postes','postes.id', '=', 'quartdetravails.post_id')
                ->join('users','users.id', '=', 'quartdetravails.pro_id')
                ->join('residences','residences.id', '=', 'quartdetravails.res_id')
                ->select(['quartdetravails.id as id','res_name as description','facteur','departement','titre','quart_etat','post_name as title','jour_debut as start','jour_fin as end','heure_debut','heure_fin'])
                ->whereBetween('jour_debut', array($request->start, $request->end))
                ->get();
                //echo json_encode($data);
                /* $query = 'SELECT quartdetravails.id as id,res_name as description,pro_id,name,
                        facteur,mask_residence,departement,titre,quart_etat,post_name as title,
                        jour_debut as start,jour_fin as end,heure_debut,heure_fin
                        FROM quartdetravails 
                        LEFT JOIN users ON users.id = quartdetravails.pro_id
                        INNER JOIN postes ON postes.id = quartdetravails.post_id
                        RIGHT JOIN residences ON residences.id = quartdetravails.res_id
                        WHERE jour_debut BETWEEN '.$request->start.' AND '.$request->end.'';

                        $well = DB::SELECT($query); 
                        $data = collect($well); */
            }else{
                $data = GetQuartByRole::getQuartForCalendar(Auth::user()->role);
            }
            return new JsonResponse($data);
        }
        
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        
        /** @var Application $application */
        $infos = GetUserInfos::getInfos();
        //dd($pro);
        $user = Auth::user();
        $postes = Poste::all();

        return view('user.profile', compact( 'user','infos','postes'));
    }

    public function change_password(Request $request)
    {
        //dd($request);
        $user = User::find($request->id);
        if($request->password==$request->repassword){
            $user->password = Hash::make($request->password);
            $user->first_auth = false;
            $user->save();
                
            return redirect()->back()->with('success', 'Mot depasse modifié !!');
        }else{
            return redirect()->back()->with('success', 'Confirmation incorrecte du mot de passe !!');
        }
        

    }


    public function modifier_password(Request $request)
    {
        //dd($request);
        $user = User::find($request->id);
        $com = Hash::make($request->current_password);

        if(Hash::check($request->current_password,$user->password)){

            if($request->password==$request->repassword){
                $user->password = Hash::make($request->password);
                $user->first_auth = false;
                $user->save();
                    
                return redirect()->back()->with('success', 'Mot depasse modifié !!');
            }else{
                return redirect()->back()->with('success', 'Confirmation incorrecte du mot de passe !!');
            }
        }else{
            return redirect()->back()->with('success', 'Mot de passe actuel incorrect !!');
        }

    }


    public function update_profile(Request $request)
    {
        //dd($request);
        $role = Auth::user()->role;
        if($role=="administrateur" || $role=="residence"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }

        $prof = Professionnel::where('user_id','=',$request->id)->first();
        //dd($prof);
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
            $prof->adresse1 =$request->adresse1;
            $prof->ville =$request->ville;
            $prof->province =$request->province;
            $prof->code_postal =$request->code_postal;
            $prof->save();
            //dd($prof);

            
            $user = User::find($request->id);
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
            $user->save();
            //dd($user);
        return redirect('profile')->with('success','Professionnel modifié');
    }


    public function update_residence(Request $request)
    {
        //dd($request);
        $role = Auth::user()->role;
        if($role=="professionnel" || $role=="administrateur"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }
        DB::table('residences')->where('resp_id',$request->id)->update(array(
            'res_name' =>$request->res_name,
            'res_phone' =>$request->res_phone,
            'res_adresse1' =>$request->res_adresse1,
            'facture_name' =>$request->facture_name,
            'facture_email'=>$request->facture_email,
            'facture_phone'=>$request->facture_phone,
            'res_ville' =>$request->res_ville,
            'res_province' =>$request->res_province,
            'res_code_postal' =>$request->res_code_postal,
            'res_temps_repas'=>$request->res_temps_repas,
            'updated_at' =>NOW()));

            $user = User::find($request->id);
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
            
            $user->name = $request->name_resp;
            $user->email = $request->email_resp;
            $user->phone = $request->phone_resp;
            //dd($user);
            $user->save();
            return redirect('profile')->with('success','Residence modifiée');
    }


    public function update_admin(Request $request)
    {
        //dd($request);
        $role = Auth::user()->role;
        if($role=="professionnel" || $role=="residence"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }
        
            $user = User::find($request->id);
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
            
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            //dd($user);
            $user->save();
            return redirect('profile')->with('success','Administrateur ou edimestre modifié');
    }

}
