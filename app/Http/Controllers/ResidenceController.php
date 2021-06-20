<?php

namespace App\Http\Controllers;

use App\Residence;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Utils\GoogleMaps;

class ResidenceController extends Controller
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
        $residences = Residence::join('users','users.id', '=', 'residences.resp_id')
        ->select(['residences.id','residences.res_name','name','residences.res_phone','res_temps_repas','email','residences.res_adresse1','residences.res_adresse2','residences.res_ville','residences.res_province','residences.res_code_postal','facture_name','facture_email','facture_phone'])
        ->get();
        return view('residence.list_residence',['residences'=>$residences]);
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
        $users = User::all();
        $residences = Residence::join('users','users.id', '=', 'residences.resp_id')
        ->where('residences.id',$id)
        ->select(['residences.*','users.*'])
        ->first();
        return view('residence.update_residence',['id'=>$id,'users'=>$users,'residences'=>$residences]);
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
        //dd($request);
        $auth = Auth::user();
        if($auth->role=="professionnel" || $auth->role=="residence"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }elseif($auth->status=="desactivé"){
            return redirect()->back()->with('success', "Votre compte n'est pas activé !! Vous ne pouvez pas acceder aux ressources !!");
        }
        DB::table('residences')->where('resp_id',$request->resp_id)->update(array(
            'res_name' =>$request->res_name,
            'res_phone' =>$request->res_phone,
            'res_adresse1' =>$request->res_adresse1,
            'res_adresse2' =>$request->res_adresse2,
            'facture_name' =>$request->facture_name,
            'facture_email'=>$request->facture_email,
            'facture_phone'=>$request->facture_phone,
            'res_ville' =>$request->res_ville,
            'res_province' =>$request->res_province,
            'res_code_postal' =>$request->res_code_postal,
            'res_temps_repas'=>$request->res_temps_repas,
            'updated_at' =>NOW()));

            $user = User::find($request->resp_id);
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
        return redirect('residence/list')->with('success','Residence modifiée');
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
        $residences = Residence::find($id); 
        $residences->delete();
      
        return redirect('residence/list')->with('success','Residence supprimée');
    }

    public function geoAddress(Request $request){
        /* $response = app('geocoder')->geocode('Los Angeles, CA')->get();
        //app('geocoder')->geocode('Los Angeles, CA')->dump('kml');
        dd($response); */

        /*
        Get the Latitude and Longitude returned from the Google Maps Address.
        */
        $coordinates = GoogleMaps::geocodeAddress( $request->get('address'), $request->get('city'), $request->get('state'), $request->get('zip') );
        dd($coordinates);
    }
}
