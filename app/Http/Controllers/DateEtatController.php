<?php

namespace App\Http\Controllers;

use App\Centre;
use App\DateEtat;
use App\Quartdetravail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DateEtatController extends Controller
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
        $role = Auth::user()->role;
        if($role=="professionnel" || $role=="residence"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }
        $dates = DB::table('dateetats')->join('quartdetravails','quartdetravails.id', '=', 'dateetats.quart_id')
                        ->join('residences','residences.id', '=', 'quartdetravails.res_id')
                        ->join('users','users.id', '=', 'dateetats.user_id')
                        //->where('quartdetravails.res_id', '=',GetResidenceId::getId())
                        ->select(['titre','jour_debut','res_name','name','etatquart'])
                        ->get();
                        //dd($facturations);
        return view('date.etat',['dates'=>$dates]);
    }
}
