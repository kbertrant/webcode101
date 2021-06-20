<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Poste;
use App\Mail\SendUserPassword;
use App\Professionnel;
use App\Residence;
use Image;
use App\Jobs\SendMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        if($data['role']=='professionnel'){
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }else{
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255', 'unique:users'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        }
        //dd($data);  
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        //generate password and cle101
        $cle101 = 'cle101-'.rand(1000,9000);
        $generate_password = 'password-'.rand(1000,5000);
        //dd($data);
        //define if it a professional or residence
        if($data['role']=='professionnel'){

            $user = new User(); 
            // Handle file Upload
        if($data['photo']){
            $photo = $data['photo'];
            // Get filename with the extension
            $filenameWithExt = $photo->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $photo->getClientOriginalExtension();
            // Filename to store
            $filePhotoToStore = $cle101.'_photo.'.$extension;
            // Upload Image
            $path = $photo->storeAs('public/avatars/',$filePhotoToStore);

        }else{
            $filePhotoToStore = "default.png";
        }

            //now store user infos
            $user->photo = $filePhotoToStore;
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($generate_password);
            $user->first_auth = true;
            $user->phone = $data['phone'];
            $user->cle101 = $cle101;
            $user->status = "desactivé";
            $user->role = $data['role'];
            $user->role_id = 1;
            $user->created_at = NOW();
            $user->updated_at = NOW();
            $user->save();
                
            $user->password = $generate_password;

            //auto send mail to new user registrated

            //SendMail::dispatch($user, new SendUserPassword($user));
            //Mail::to($user->email)->cc('kbertrant@yahoo.fr')->send(new SendUserPassword($user));

            ///////*********************** */
            // STORE PROFESSIONNEL INFORMATIONS
            if($data['post_id']==1 || $data['post_id']==2){
                if($data['carte_rcr']){
                    $rcr = $data['carte_rcr'];
                    // Get filename with the extension
                    $filenameWithExt = $rcr->getClientOriginalName();
                    //Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $rcr->getClientOriginalExtension();
                    // Filename to store
                    $fileRCRToStore = $cle101.'_RCR.'.$extension;
                    // Upload Image
                    $path = $rcr->storeAs('public/carte_rcr/',$fileRCRToStore);
        
                }else{
                    $fileRCRToStore = "default.png";
                }
                if($data['attestation_pdsb']){
                    $attestation = $data['attestation_pdsb'];
                    // Get filename with the extension
                    $filenameWithExt = $attestation->getClientOriginalName();
                    //Get just filename
                    $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                    // Get just ext
                    $extension = $attestation->getClientOriginalExtension();
                    // Filename to store
                    $filePDSBToStore = $cle101.'_PDSB.'.$extension;
                    // Upload Image
                    $path = $attestation->storeAs('public/attestation_pdsb/',$filePDSBToStore);
        
                }else{
                    $filePDSBToStore = "default.png";
                }
    
                $data['num_pratique'] = "No degre";
            }else{
                $filePDSBToStore = "default.png";
                $fileRCRToStore = "default.png";

            }
            if($data['specimen_cheque']){
                $cheque = $data['specimen_cheque'];
                // Get filename with the extension
                $filenameWithExt = $cheque->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $cheque->getClientOriginalExtension();
                // Filename to store
                $fileCHEQUEToStore = $cle101.'_CHEQUE.'.$extension;
                // Upload Image
                $path = $cheque->storeAs('public/cheque/',$fileCHEQUEToStore);
    
            }else{
                $fileCHEQUEToStore = "default.png";
            }

            if($data['diplome_recent']){
                $diplome = $data['diplome_recent'];
                // Get filename with the extension
                $filenameWithExt = $diplome->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $diplome->getClientOriginalExtension();
                // Filename to store
                $fileDIPLOMEToStore = $cle101.'_DIPLOME.'.$extension;
                // Upload Image
                $path = $diplome->storeAs('public/diplome/',$fileDIPLOMEToStore);
    
            }else{
                $fileDIPLOMEToStore = "default.png";
            }
            
            if($data['carte_identite']){
                $cni = $data['carte_identite'];
                // Get filename with the extension
                $filenameWithExt = $cni->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $cni->getClientOriginalExtension();
                // Filename to store
                $fileCNIToStore = $cle101.'_CNI.'.$extension;
                // Upload Image
                $path = $cni->storeAs('public/identification/',$fileCNIToStore);
    
            }else{
                $fileCNIToStore = "default.png";
            }

            if($data['votre_cv']){
                $cv = $data['votre_cv'];
                // Get filename with the extension
                $filenameWithExt = $cv->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                // Get just ext
                $extension = $cv->getClientOriginalExtension();
                // Filename to store
                $fileCVToStore = $cle101.'_CV.'.$extension;
                // Upload Image
                $path = $cv->storeAs('public/cv/',$fileCVToStore);
    
            }else{
                $fileCVToStore = "default.png";
            }

            if($data['num_pratique']){
                     
            }else{
                $data['num_pratique'] = "Pas de numero";
            }
            if($data['adresse2']){
                     
            }else{
                $data['adresse2'] = "Inconnu";
            }
            
            $prof = new Professionnel();
                $prof->user_id=$user->id;
                $prof->post_id=$data['post_id'];
                $prof->num_pratique=$data['num_pratique'];
                $prof->dist_max=$data['dist_max'];
                $prof->annee_exp=$data['annee_exp'];
                $prof->langue=$data['langue'];
                $prof->statut_employe=$data['statut_employe'];
                $prof->adresse1=$data['adresse1'];
                $prof->adresse2=$data['adresse2'];
                $prof->ville=$data['ville'];
                $prof->province=$data['province'];
                $prof->code_postal=$data['code_postal'];
                $prof->condamnations=$data['condamnations'];
                $prof->votre_cv=$fileCVToStore;
                $prof->specimen_cheque=$fileCHEQUEToStore;
                $prof->carte_identite=$fileCNIToStore;
                $prof->diplome_recent=$fileDIPLOMEToStore;
                $prof->carte_rcr=$fileRCRToStore;
                $prof->attestation_pdsb=$filePDSBToStore;
                $prof->created_at = NOW();
                $prof->updated_at = NOW();
                $prof->save();
            
        }else{

            //dd($data);
            //generate password and cle101
            $cle101 = 'cle101-'.rand(1000,9000);
            $generate_password = 'password-'.rand(1000,5000);

            $resp = new User();     
            $resp->name = $data['name'];
            $resp->email = $data['email'];
            $resp->password = Hash::make($generate_password);
            $resp->first_auth = true;
            $resp->phone = $data['resp_phone'];
            $resp->cle101 = $cle101;
            $resp->status = 'desactivé';
            $resp->role = $data['role'];
            $resp->role_id = 2;
            $resp->save();

            $resp->password = $generate_password;

            //auto send mail to new user registrated
            //SendMail::dispatch($resp, new SendUserPassword($resp));
            Mail::to($resp->email)->cc('kbertrant@yahoo.fr')->send(new SendUserPassword($resp));

            if($data['res_adresse2']){
            }else{
                $data['res_adresse2'] = "Inconnu";
            }
            //create a residence
            Residence::create([
                'resp_id'=>$resp->id,
                'res_name'=>$data['res_name'],
                'res_phone'=>$data['res_phone'],
                'facture_name'=>$data['name_fac'],
                'facture_email'=>$data['email_fac'],
                'facture_phone'=>$data['fac_phone'],
                'res_adresse1'=>$data['res_adresse1'],
                'res_adresse2'=>$data['res_adresse2'],
                'res_ville'=>$data['res_ville'],
                'res_temps_repas'=>$data['res_temps_repas'],
                'res_province'=>$data['res_province'],
                'res_code_postal'=>$data['res_code_postal'],
            ]);

        }
        
    }

    public function showRegistrationForm()
    {
        $postes = Poste::all();
        return view("auth.register", compact("postes"));
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return redirect($this->redirectPath())->with('success', 'Votre compte a bien été crée !
         Vous recevrez un mail de confirmation contenant votre mot de passe temporaire.
          Lors de votre première connexion, vous serez invité(e) à modifier ce mot de passe.');
    }
}
