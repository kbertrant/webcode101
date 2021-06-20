<?php

namespace App\Http\Controllers;

use App\JourFerie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JourFerieController extends Controller
{
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
        $joursferies = JourFerie::all();
        return view('ferie.list_jour_ferie',['joursferies'=>$joursferies]);
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
        return view('ferie.create_jour_ferie');
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
        $joursferies = new JourFerie();
        $joursferies->name_ferie = $request->name_ferie;
        $joursferies->date_ferie = $request->date_ferie;
       
        $joursferies->save();

        $joursferies = JourFerie::all();
        return view('ferie.list_jour_ferie',['joursferies'=>$joursferies]);
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
        $joursferies = JourFerie::find($id);
        return view('ferie.update_jour_ferie',['id'=>$id,'joursferies'=>$joursferies]);
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
        DB::table('jour_feries')->where('id',$request->id)->update(array(
            'name_ferie' =>$request->name_ferie,
            'date_ferie' =>$request->date_ferie,
            'updated_at' =>NOW()));
            //return redirect()->back()->with('success');
        //return $product;
        //$joursferies = JourFerie::all();
       // return view('ferie.list_jour_ferie',['joursferies'=>$joursferies]);
        return redirect('jourferie/list')->with('success','Jour férié modifie');
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
        $joursferies = JourFerie::find($id); 
        $joursferies->delete();
      
        return redirect('jourferie/list')->with('success','Jour férié supprimé');
    }
}
