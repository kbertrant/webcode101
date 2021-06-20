<?php

namespace App\Http\Controllers;
use App\Poste;
use App\User;
use App\DateEtat;
use App\Residence;
use App\Facturation;
use App\Quartdetravail;
use App\Utils\GetResidenceId;
use App\Utils\GetAccess;
use App\Utils\GetPoste;
use App\Utils\GetFacturation;
use App\Utils\GetJoursFeries;
use App\Utils\TestAnnulationQuart;
use App\Notifications\QuartEtat;
use App\Notifications\QuartCreation;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QuartDeTravailController extends Controller
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
        $postes = Poste::all();
        $residences = Residence::orderBy('res_name', 'ASC')->get();
        $users = User::where('role','=','professionnel')->orderBy('name', 'ASC')->get();
        return view('quart.create_quart',compact('postes','residences','users','auth'));
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
        $auth = Auth::user();
        if($auth->role=="professionnel"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }elseif($auth->status=="desactivé"){
            return redirect()->back()->with('success', "Votre compte n'est pas activé !! Vous ne pouvez pas acceder aux ressources !!");
        }


        $joursFeries = GetJoursFeries::getFerie();
        if($auth->role=="residence"){
            $residence_id = GetResidenceId::getId();
            //dd($request);
            $s = 0;
            foreach ($request->date_debut as $p) {
                $i = $s++;
                $cle101 = 'CODE101-'.rand(1000,9000);
                
                
                $date_fin = GetFacturation::getDateFin($request->date_debut[$i],$request->heure_debut[$i],$request->heure_fin[$i]);
                $quart = new Quartdetravail();
                // test si le quart est crée moins de 4h avant sa date deabut
                if(GetFacturation::getFacteur($request->date_debut[$i],$request->heure_debut[$i]) || $request->urgent[$i] =="oui"){
                    $quart->facteur ='1.5';
                    $users = User::where('role','=','professionnel')->get();
                    Notification::send($users, new QuartCreation());
                }
                
                // tester si la date debut est egal à un jour ferié
                foreach($joursFeries as $jour){
                    if(date("d-m",strtotime($request->date_debut[$i]))==date("d-m",strtotime($jour->date_ferie))){
                        $quart->facteur ='2';
                    }
                }

                $quart->titre =$cle101;
                $quart->res_id =$residence_id;
                $quart->post_id =$request->post_id[$i];
                $quart->jour_debut =$request->date_debut[$i];
                $quart->jour_fin =$date_fin;
                $quart->jour_fin =$date_fin;
                $quart->heure_debut =$request->heure_debut[$i];
                $quart->heure_fin = $request->heure_fin[$i];
                $quart->departement =$request->departement[$i];
                $quart->created_at =NOW();
                $quart->updated_at =NOW();
                $quart->save();

                // create date change etat
                $dateEtat = new DateEtat();
                $dateEtat->quart_id = $quart->id;
                $dateEtat->user_id = $auth->id;
                $dateEtat->etatquart ="Disponible";
                $dateEtat->date_etat = NOW();
                $dateEtat->save();
                  
            }
        }else{
            //if user is administrateur or edimestre
            //dd($request);
            
            $s = 0;
            foreach ($request->date_debut as $p) {
                $cle101 = 'CODE101-'.rand(1000,9000);
                $i = $s++;
                //dd($request);
                //if personnel assigné alors etat = accepté dans
                $quart_etat = GetFacturation::getEtatQuart($request->pro_id[$i]);
                
                $date_fin = GetFacturation::getDateFin($request->date_debut[$i],$request->heure_debut[$i],$request->heure_fin[$i]);
                $quart = new Quartdetravail();
                $quart->titre =$cle101;
                $quart->res_id =$request->res_id[$i];
                if(GetFacturation::getFacteur($request->date_debut[$i],$request->heure_debut[$i]) || $request->urgent[$i] =="oui"){
                    $quart->facteur ='1.5';
                    $users = User::where('role','=','professionnel')->get();
                    Notification::send($users, new QuartCreation());

                }
                //dd($joursFeries);
                //masquer pour la résidence
                if($request->mask_residence[$i]=='oui'){
                    $quart->mask_residence ='oui';
                }
                // tester si la date debut est egal à un jour ferié
                foreach($joursFeries as $jour){
                    if(date("d-m",strtotime($request->date_debut[$i]))==date("d-m",strtotime($jour->date_ferie))){
                        $quart->facteur ='2';
                    }
                }
                
                if($request->pro_id[$i]=="null"){
                    $quart->quart_etat ="Disponible";
                }else{
                    $quart->pro_id =$request->pro_id[$i];
                    $quart->quart_etat ="Accepté";
                }
                $quart->post_id =$request->post_id[$i];
                $quart->jour_debut =$request->date_debut[$i];
                $quart->jour_fin =$date_fin;
                $quart->heure_debut =$request->heure_debut[$i];
                $quart->heure_fin =$request->heure_fin[$i];
                $quart->departement =$request->departement[$i];
                $quart->created_at =NOW();
                $quart->updated_at =NOW();
                //dd($quart);
                $quart->save();

                // create date change etat
                $dateEtat = new DateEtat();
                $dateEtat->quart_id = $quart->id;
                $dateEtat->user_id = $auth->id;
                $dateEtat->etatquart =$quart->quart_etat;
                $dateEtat->date_etat = NOW();
                $dateEtat->save();

            }
        }

        $role = Auth::user()->role;
        $postes = Poste::all();
        $residences = Residence::all();
        $users = User::all();

        return redirect()->route('home')->with('success', 'Quart crée avec succès !!');
        //return redirect()->back()->with('success', 'Quart crée avec succès !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $auth = Auth::user();
        $access = GetAccess::accessToQuart($auth->id,$id);
        if($access){
            return redirect()->back()->with('success', "Attention !! Vous ne pouvez pas voir ce quart de travail !!");
        }elseif($auth->status=="desactivé"){
            return redirect()->back()->with('success', "Votre compte n'est pas activé !! Vous ne pouvez pas acceder aux ressources !!");
        }
        
        $quart = Quartdetravail::find($id);
        $date = DateEtat::join('users','users.id', '=', 'dateetats.user_id')
        ->where('quart_id',$quart->id)->get();
        //dd($date);
        $residence = Residence::find($quart->res_id);
        $poste = Poste::find($quart->post_id);
        $pro = User::find($quart->pro_id);
        return view('quart.show_quart',compact('quart','residence','poste','pro','auth','date'));
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
        $quart = Quartdetravail::find($id);
        if($quart->quart_etat=="Réalisé" && $auth->role == 'professionnel'){
            return redirect()->back()->with('success', 'Non votre quart est déjà réalisé !!');
        }elseif($quart->quart_etat=="Validé" && $auth->role == 'residence'){
            return redirect()->back()->with('success', 'Non votre quart est déjà validé !!');
        }elseif($quart->quart_etat=="Accepté" && $auth->role == 'residence'){
            return redirect()->back()->with('success', 'Non votre quart est déjà Accepté !!');
        }
        $residence = Residence::find($quart->res_id);
        $residences = Residence::orderBy('res_name', 'ASC')->get();
        $poste = Poste::find($quart->post_id);
        $postes = Poste::all();
        $pro = User::find($quart->pro_id);
        $users = User::where('role','=','professionnel')->orderBy('name', 'ASC')->get();
        
        return view('quart.update_quart',compact('quart','residence','residences','poste','postes','pro','auth','users'));
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
        $quart = Quartdetravail::find($request->id);

        //masquer pour la résidence
        $date_fin = GetFacturation::getDateFin($request->date_debut,$request->heure_debut,$request->heure_fin);
        
        //masquer pour la résidence
        if($request->mask_residence=="oui"){
            $quart->mask_residence ='oui';
        }

        $quart->quart_etat = $request->quart_etat;
        $quart->pro_id = $request->pro_id;
        $quart->commentaires = $request->commentaires;
        $quart->note = $request->note;
        $quart->facteur = $request->facteur;
        $quart->post_id = $request->post_id;
        $quart->res_id = $request->res_id;
        $quart->jour_debut = $request->date_debut;
        $quart->jour_fin = $date_fin;
        $quart->heure_debut = $request->heure_debut;
        $quart->heure_fin = $request->heure_fin;
        $quart->departement =$request->departement;
        $quart->temps_repas =$request->temps_repas;
        $quart->heure_sup =$request->heure_sup;
        $quart->save();

        $dateEtat = new DateEtat();
        $dateEtat->quart_id = $quart->id;
        $dateEtat->user_id = $auth->id;
        $dateEtat->etatquart ='Modifié';
        $dateEtat->date_etat = NOW();
        $dateEtat->save();

        return redirect()->route('home')->with('success', 'Quart modifié avec succes !!');
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
        $quart = Quartdetravail::find($id); 
        if($quart->quart_etat=="Réalisé"){
            return redirect()->back()->with('success', 'Non votre quart est déjà réalisé !!');
        }elseif($quart->quart_etat=="Validé"){
            return redirect()->back()->with('success', 'Non votre quart est déjà validé !!');
        }elseif($quart->quart_etat=="Accepté"){
            return redirect()->back()->with('success', 'Non votre quart est déjà Accepté !!');
        }
        $quart->delete();
      
        return redirect()->back()->with('success','Quart de travail supprimé');
    }


    /**
     * Update a quart de travail resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function etat_change(Request $request)
    {
        
        //dd($request);
        $quart = Quartdetravail::find($request->quart_id);
        $poste = Poste::find($quart->post_id);

        if($quart->quart_etat=="Réalisé" && Auth::user()->role=="professionnel"){
            return redirect()->back()->with('success', 'Non votre quart est déjà réalisé !!');
        }elseif($quart->quart_etat=="Validé" && Auth::user()->role=="residence"){
            return redirect()->back()->with('success', 'Non votre quart est déjà validé !!');
        }elseif($quart->quart_etat=="Annulé" && Auth::user()->role=="professionnel"){
            return redirect()->back()->with('success', 'Non votre quart est déjà Annulé !!');
        }
        $auth = Auth::user();
        if($request->quart_etat=="Accepté"){
            
            
            if($auth->role=="residence"){
                return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
            }
            $quart->pro_id = Auth::user()->id;
            $quart->quart_etat =  $request->quart_etat;
            $quart->save();
            //dd($quart->id)
            // create date change etat
            $dateEtat = new DateEtat();
            $dateEtat->quart_id = $quart->id;
            $dateEtat->user_id = $auth->id;
            $dateEtat->etatquart =$request->quart_etat;
            $dateEtat->date_etat = NOW();
            $dateEtat->save();

            //notifications to residence
            $res = User::find(GetResidenceId::getResponsableId($quart->res_id));
            $res->notify(new QuartEtat($poste,$quart));
            //notifications to personnel
            $user= User::find($quart->pro_id);
            $user->notify(new QuartEtat($poste,$quart));

        }elseif($request->quart_etat=="Réalisé"){

            
            if($auth->role=="residence"){
                return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
            }
            if($quart->quart_etat=="Disponible"){
                return redirect()->back()->with('success', 'Votre quart doit etre accepté au préalable !!');
            }

            if($request->temps_repas==null){
                return redirect()->back()->with('success', 'Vous devez remplir le temps repas au préalable !!');
            }
            $quart->quart_etat =  $request->quart_etat;
            $quart->temps_repas =  $request->temps_repas;
            $quart->heure_sup =  $request->heure_sup;
            $quart->save();

            // update date realisation change etat
            $dateEtat = new DateEtat();
            $dateEtat->quart_id = $quart->id;
            $dateEtat->user_id = $auth->id;
            $dateEtat->etatquart =$request->quart_etat;
            $dateEtat->date_etat = NOW();
            $dateEtat->save();

            $interval = GetFacturation::getInterval($quart->heure_debut,$quart->heure_fin);
            
            //etablissement de la facturation du quart...
            $facturation = new Facturation();

            //taux heure des quarts et heure supplementaire
            $jour = strtotime('07:00');
            $soir = strtotime('15:00');
            $nuit = strtotime('22:00');
            $h_fin = strtotime($quart->heure_fin);

            if($h_fin >= $nuit && $h_fin <= $jour){
                $facturation->heure_nuit = $interval;
                $facturation->supp_nuit = $request->heure_sup;

            }elseif($h_fin >= $jour && $h_fin <= $soir){
                $facturation->heure_jour = $interval;
                $facturation->supp_jour = $request->heure_sup;

            }elseif($h_fin >= $soir && $h_fin <= $nuit){
                $facturation->heure_soir = $interval;
                $facturation->supp_soir = $request->heure_sup;
            }
            $facturation->quart_id = $quart->id;
        
            $facturation->facturation_residence = GetFacturation::getDepense($quart->heure_fin,$quart->post_id,$quart->facteur,$quart->heure_sup,$interval,$quart->res_id);
            $facturation->remuneration_pro = GetFacturation::getRemuneration($quart->heure_fin,$quart->post_id,$quart->facteur,$quart->heure_sup,$interval,$quart->temps_repas);
            //dd($facturation);
            $facturation->save();

            //notifications to residence
            $res = User::find(GetResidenceId::getResponsableId($quart->res_id));
            $res->notify(new QuartEtat($poste,$quart));
            //notifications to personnel
            $user= User::find($quart->pro_id);
            $user->notify(new QuartEtat($poste,$quart));
        }elseif($request->quart_etat=="Validé"){
            
            
            if($auth->role=="professionnel"){
                return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
            }
            if($request->commentaires==null){
                return redirect()->back()->with('success', 'Vous devez commenter avant de valider !!');
            }
            $quart->quart_etat =  $request->quart_etat;
            $quart->commentaires =  $request->commentaires;
            $quart->note =  $request->note;
            $quart->save();

            // update date acceptation change etat
            $dateEtat = new DateEtat();
            $dateEtat->quart_id = $quart->id;
            $dateEtat->user_id = $auth->id;
            $dateEtat->etatquart =$request->quart_etat;
            $dateEtat->date_etat = NOW();
            $dateEtat->save();

            // Notification
            //notifications to residence
            $res = User::find(GetResidenceId::getResponsableId($quart->res_id));
            $res->notify(new QuartEtat($poste,$quart));
            //notifications to pro
            $user= User::find($quart->pro_id);
            $user->notify(new QuartEtat($poste,$quart));
            
        }elseif($request->quart_etat=="Annulé"){
            
            // update date acceptation change etat
            $dateEtat = new DateEtat();
            $dateEtat->quart_id = $quart->id;
            $dateEtat->user_id = $auth->id;
            $dateEtat->etatquart =$request->quart_etat;
            $dateEtat->date_etat = NOW();
            $dateEtat->save();

            $quart->pro_id = null;
            $quart->quart_etat =  $request->quart_etat;
            $quart->save();

            //notifications to residence
            $res = User::find(GetResidenceId::getResponsableId($quart->res_id));
            $res->notify(new QuartEtat($poste,$quart));
        }else{
            
            /* $annulation = TestAnnulationQuart::getTestAnnulation($quart->id);
            if($annulation){
                
            } */
            // update date acceptation change etat
            $dateEtat = DateEtat::where('quart_id',$quart->id)->first();
            $dateEtat->date_annulation = NOW();
            $dateEtat->save();

            $quart->pro_id = null;
            $quart->quart_etat =  $request->quart_etat;
            $quart->save();

            //notifications to residence
            $res = User::find(GetResidenceId::getResponsableId($quart->res_id));
            $res->notify(new QuartEtat($poste,$quart));
        }
        
        return redirect()->route('home')->with('success', 'Etat du quart modifié !!');
    }


    public function note_list(){

        $notes = User::join('quartdetravails', 'quartdetravails.pro_id', '=', 'users.id')
                        ->join('professionnels', 'professionnels.user_id', '=', 'users.id')
                        ->join('postes','postes.id', '=', 'professionnels.post_id')
                        ->groupBy('users.id')
                        ->where('quart_etat','=','validé')
                        ->select([DB::raw('COUNT(quartdetravails.id) as nbre_quart'),'quartdetravails.id as quart_id',DB::raw('AVG(quartdetravails.note) as moy_quart'),'post_name','name','email'])
                        ->get();
        return view('note.list_note',compact('notes'));
    }

    public function mes_quarts(){
        $quart = Quartdetravail::join('postes','postes.id', '=', 'quartdetravails.post_id')
                        ->join('residences', 'residences.id', '=', 'quartdetravails.res_id')
                        ->join('users', 'users.id', '=', 'quartdetravails.pro_id')
                        ->where('quartdetravails.pro_id','=',Auth::user()->id)
                        ->select(['quartdetravails.id as quart_id','res_name','facteur','titre','quart_etat','post_name','jour_debut','heure_debut','heure_fin'])
                        ->get(); 
        return view('quart.mes_quarts',compact('quart'));
    }
}
