<?php

namespace App\Http\Controllers;

use App\User;
use App\Mail\SendUserPassword;
use App\Jobs\SendMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::where('role','administrateur')->orWhere('role','edimestre')->get();
        return view('user.liste_utilisateur',['users'=>$users]);
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
        return view('user.create_utilisateur');
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
        $cle101 = 'cle101-'.rand(1000,5000);
        $generate_password = 'password-'.rand(1000,5000);

        $users = new User();

        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($generate_password);
        $users->first_auth = true;
        $users->phone = $request->phone;
        $users->cle101 = $cle101;
        $users->status = "desactivé";
        $users->role = $request->role;
        $users->role_id = 2;
        
        $users->save();

        $users->password = $generate_password;

        //auto send mail to new user registrated
        //SendMail::dispatch($fact, new SendUserPassword($fact));
        Mail::to($users->email)->send(new SendUserPassword($users));
           
        
        return redirect()->route('user.liste')->with('success', 'Administrateur crée avec succes !!');
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
        $users = User::find($id);
        //dd($id);
        return view('user.update_user',['id'=>$id,'users'=>$users]);
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
        
        if($request->password==NULL){
            
        DB::table('users')->where('id',$request->id)->update(array(
            'name' =>$request->name,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'role' =>$request->role,
            'status' =>$request->status,
            'updated_at' =>NOW()));
        }else{
            DB::table('users')->where('id',$request->id)->update(array(
                'name' =>$request->name,
                'email' =>$request->email,
                'phone' =>$request->phone,
                'password' =>Hash::make($request->password),
                'role' =>$request->role,
                'status' =>$request->status,
                'updated_at' =>NOW()));
        }
        return redirect('user/liste')->with('success','Utilisateur modifié !! ');
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
        $users = User::find($id); 
        $users->delete();
      
        return redirect('user/liste')->with('success','Utilisateur supprimé');
    }

    /* public function search(Request $request)
    {
        $search = $request->get('search');

        $users = DB::table('users')->where('name', 'like', '%'.$search.'%')
                                   ->paginate(10);

        return view('user.liste_utilisateur',['users'=>$users]);
    }
    public function searchs(Request $request)
    {
        $searchs = $request->get('searchs');

        $users = DB::table('users')->where('role', 'like', '%'.$searchs.'%')
                                   ->paginate(10);

        return view('user.liste_utilisateur',['users'=>$users]);
    }
    public function searches(Request $request)
    {
        $searches = $request->get('searches');

        $users = DB::table('users')->where('status', 'like', '%'.$searches.'%')
                                   ->paginate(10);

        return view('user.liste_utilisateur',['users'=>$users]);
    } */
}
