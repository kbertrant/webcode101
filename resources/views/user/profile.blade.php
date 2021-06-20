@extends('main')

@section('title', ' Profile')


@section('main-content')
	<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
		<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

			    <!-- begin:: Subheader -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">Mon profile</h3>
                        <h4 class="kt-subheader__desc">Informations, adresse, coordonées</h4>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
					</div>
                </div>
                
                <!-- end:: Subheader -->
                <div class="kt-portlet__body">
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="kt-font-brand flaticon2-card"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Mon profil
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            
                            <!-- debut tab pane -->
                            <ul class="nav nav-tabs center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#" data-target="#kt_tabs_1_1">Information sur le profil</a>
                                </li>
                            </ul>
                            <!-- fin tab pane -->

                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_tabs_1_1" role="tabpanel">

                            <div class="col-md-12">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row">
                                    <div class="col-md-4">
                                        <img src="/storage/app/public/avatars/{{ Auth::user()->photo }}" style="width:200px; height:200px;border-radius: 50%">
                                        <br> <br>
                                    </div>
                                    <div class="col-md-4">
                                        Noms & Prénoms : <b> {{ Auth::user()->name }}</b><br>
                                        Adresse émail : <b> {{ Auth::user()->email }}</b><br>
                                        Téléphone : <b> {{ Auth::user()->phone }}</b><br> 
                                        Statut : <b> {{ Auth::user()->status }}</b><br> 
                                        clé 101 : <b> {{ Auth::user()->cle101 }}</b><br>
                                        Date inscription : <b> {{ date('d M y, H:i',strtotime(Auth::user()->created_at))}}</b><br>
                                                                                    
                                    </div>
                                    <div class="col-md-4">
                                        @if(Auth::user()->role == "professionnel")
                                            Titre professionnel : <b> {{ $infos->post_name }}</b><br>
                                            Statut travailleur : <b> {{ $infos->statut_employe }}</b><br>
Numéro pratique : <b> {{ $infos->num_pratique }}</b><br>
                                            Distance maximale : <b> {{ $infos->dist_max }}</b><br>
                                            Années d'expérience : <b> {{ $infos->annee_exp }}</b><br> 
                                            Langue : <b> {{ $infos->langue }}</b><br> 
                                            Nom de rue : <b> {{ $infos->adresse1 }}</b><br>
                                            Numero appartement : <b> {{ $infos->adresse2 }}</b><br>
                                            Province : <b> {{ $infos->province }}</b><br>
                                            ville : <b> {{ $infos->ville }}</b><br>
                                            Code postal : <b> {{ $infos->code_postal }}</b><br>
                                        @elseif(Auth::user()->role == "residence")
                                            Nom de la résidence : <b> {{ $infos->res_name }}</b><br>
                                            téléphone résidence : <b> {{ $infos->res_phone }}</b><br> 
                                            Numero  : <b> {{ $infos->res_adresse2 }}</b><br> 
                                            Nom de rue : <b> {{ $infos->res_adresse1 }}</b><br>
                                            Province : <b> {{ $infos->res_province }}</b><br>
                                            ville : <b> {{ $infos->res_ville }}</b><br>
                                            Code postal : <b> {{ $infos->res_code_postal }}</b><br>
                                        @else
                                        @endif
                                        </div>

                                    <div>
                                        <button type="button" class="btn btn-outline-brand btn-sm" data-toggle="modal" data-target="#kt_modal_1"> Modifier</button>
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#kt_modal_2"> Changer votre mot de passe</button>
                                    </div>
                                        <div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modifier profil</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                @if(Auth::user()->role == "professionnel")                       
                                <form class="kt-form" enctype="multipart/form-data" method="POST" action="{{ route('profile.update') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input class="form-control" type="hidden" value="{{ $infos->id }}" id="id" name="id">
                                            <input class="form-control" type="hidden" value="{{ Auth::user()->cle101 }}" id="cle101" name="cle101">
                                           <div class="input-form">
                                                <input class="form-control" type="text" value="{{ Auth::user()->name }}" id="name" name="name" required >
                                                <span class="form-text text-muted">Noms & Prenoms*:</span>
                                            </div><br>
                                           <div class="input-form">
                                                <input class="form-control" type="text" value="{{ Auth::user()->email }}" id="email" name="email" required >
                                                <span class="form-text text-muted">Adresse email*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <input class="form-control" type="hidden" value="professionnel"  id="role" name="role" >
                                                <select class="form-control" name="statut_employe" id="statut_employe" required>
                                                    <option value="{{$infos->statut_employe}}">{{$infos->statut_employe}}</option>
                                                    <option value="Employé">Employé</option>
                                                    <option value="Travailleur autonome">Travailleur autonome</option>
                                                </select>
                                                <span class="form-text text-muted">votre statut*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <input type="file" class="form-control" id="specimen_cheque" name="specimen_cheque" >
                                                <span class="form-text text-muted">Votre specimen cheque*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <input class="form-control" type="text" value="{{$infos->dist_max}}" id="dist_max" name="dist_max" required>
                                                <span class="form-text text-muted">Distance acceptable domicile-travail*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <input type="file" class="form-control" id="votre_cv" name="votre_cv">
                                                <span class="form-text text-muted">Votre CV*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <select class="form-control" name="langue" id="langue" required>
                                                   <option value="{{$infos->langue}}">{{$infos->langue}}</option>
                                                   <option value="Français">Français</option>
                                                   <option value="Anglais">Anglais</option>
                                                </select>
                                                <span class="form-text text-muted">Votre langue*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <input type="file" class="form-control" id="photo" name="photo" >
                                                <span class="form-text text-muted">Votre photo*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <input class="form-control" type="text" value="{{$infos->adresse1}}" name="adresse1" id="adresse1">
                                                <span class="form-text text-muted">Nom & Numero de rue*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <input class="form-control" type="text" value="{{$infos->adresse2}}" name="adresse2" id="adresse2" required>
                                                <span class="form-text text-muted">Numero d'appartement*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <input class="form-control" type="text" value="{{$infos->code_postal}}" name="code_postal" id="code_postal" required>
                                                <span class="form-text text-muted">Votre code postal*:</span>
                                            </div><br>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-form">
                                                <input class="form-control" type="tel" value="{{ Auth::user()->phone }}" id="phone" name="phone" required>
                                                <span class="form-text text-muted">Votre numro de telephone*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <input type="file" class="form-control" id="diplome_recent" name="diplome_recent" >
                                                <span class="form-text text-muted">Votre diplome recent*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <input class="form-control" type="text" value="{{$infos->annee_exp}}" id="annee_exp" name="annee_exp" required>
                                                <span class="form-text text-muted">Nombre d'annees d'experience*:</span>
                                            </div>
                                            <br>
                                            <div class="input-form">
                                                <input type="file" class="form-control" id="carte_identite" name="carte_identite">
                                                <span class="form-text text-muted">Votre piece d'identification*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <select class="form-control" id="post_id" name="post_id" required>
                                                    <option value="{{$infos->post_id}}">{{$infos->post_name}}</option>
                                                    @foreach ($postes as $poste)
                                                        <option value="{{ $poste->id }}">{{ $poste->post_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="form-text text-muted">Votre poste*:</span>
                                            </div><br>
                                            <div class="input-form diff">
                                                <input type="file" class="form-control" id="carte_rcr" name="carte_rcr">
                                                <span class="form-text text-muted">Votre carte RCR*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <input class="form-control" type="text" value="{{$infos->num_pratique}}" name="num_pratique" id="num_pratique">
                                                <span class="form-text text-muted">Votre numero pratique*:</span>
                                            </div><br>
                                            <div class="input-form diff">
                                                <input type="file" class="form-control" id="attestation_pdsb" name="attestation_pdsb">
                                                <span class="form-text text-muted">Votre attestation PDSB*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <select class="form-control" name="province" id="province" required>
                                                   <option value="{{$infos->province}}">{{$infos->province}}</option>
                                                   <option value="Alberta">Alberta</option>
                                                   <option value="Colombie-Britanique">Colombie-Britanique</option>
                                                   <option value="Manitoba">Manitoba</option>
                                                   <option value="Nouveau-Brunswick">Nouveau-Brunswick</option>
                                                   <option value="Terre Neuve et Labrador">Terre Neuve et Labrador</option>
                                                   <option value="Territoires du Nord-Ouest">Territoires du Nord-Ouest</option>
                                                   <option value="Nouvelle-Ecosse">Nouvelle-Ecosse</option>
                                                   <option value="Nunavut">Nunavut</option>
                                                   <option value="Ontario">Ontario</option>
                                                   <option value="Ile du Prince Edouard">Ile du Prince Edouard</option>
                                                   <option value="Québec">Québec</option>
                                                   <option value="Saskatchewan">Saskatchewan</option>
                                                   <option value="Yukon">Yukon</option>
                                                </select>
                                                <span class="form-text text-muted">Votre province*:</span>
                                            </div><br>
                                            <div class="input-form">
                                                <input class="form-control" type="text" value="{{$infos->ville}}" name="ville" id="ville" required>
                                                <span class="form-text text-muted">Votre ville*:</span>
                                            </div><br>
                                        </div>
                                        
                                    </div>
                                
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                        @elseif(Auth::user()->role == "residence")
                            <form class="kt-form" method="POST" action="{{ route('profile.residence') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                    <div class="input-form">
                                        <input class="form-control" type="hidden" value="{{ $infos->id }}" id="id" name="id">
                                        <input class="form-control" type="text" value="{{ $infos->name }}" id="name_resp" name="name_resp" required>
                                        <span class="form-text text-muted">Noms du responsable*:</span>
                                    </div><br>
                                    <div class="input-form">
                                            <input class="form-control" type="text" value="{{ $infos->facture_name }}" id="facture_name" name="facture_name" required >
                                            <span class="form-text text-muted">Noms du facturier*:</span>
                                    </div> <br>
                                    
                                    <div class="input-form">
                                        <input class="form-control" type="text" value="{{ $infos->email }}" id="email_resp"  name="email_resp" required>
                                        <span class="form-text text-muted">Email du responsable*:</span>
                                    </div><br>
                                    <div class="input-form">
                                        <input class="form-control" type="text" value="{{ $infos->facture_email }}" id="facture_email" name="facture_email" required >
                                        <span class="form-text text-muted">Email du facturier*:</span>
                                    </div><br>
                                    <div class="input-form">
                                        <input class="form-control" type="text" value="{{ $infos->phone }}" id="phone_resp" name="phone_resp" required>
                                        <span class="form-text text-muted">Telephone du responsable de la residence*:</span>
                                    </div><br>
                                    
                                    <div class="input-group">
                                        <input class="form-control" type="hidden" value="residence"  id="role" name="role" >
                                    </div><br>
                                    <div class="input-form">
                                        <input class="form-control" type="text" value="{{ $infos->res_ville }}" id="res_ville" name="res_ville" required>
                                        <span class="form-text text-muted">Ville de la residence*:</span>
                                    </div><br>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-form">
                                            <input class="form-control" type="text" value="{{ $infos->facture_phone }}" name="facture_phone" id="facture_phone" required>
                                            <span class="form-text text-muted">Telephone facturier*:</span>
                                        </div><br>
                                    
                                        <div class="input-form">
                                            <input class="form-control" type="text" value="{{ $infos->res_name }}" id="res_name" name="res_name" required>
                                            <span class="form-text text-muted">Nom de la residence province*:</span>
                                        </div><br>
                                        <div class="input-form">
                                            <input class="form-control" type="tel" value="{{ $infos->res_phone }}" id="res_phone" name="res_phone" required>
                                            <span class="form-text text-muted">Telephone de la residence*:</span>
                                        </div><br>
                                    
                                        <div class="input-form">
                                            <input class="form-control" type="text" value="{{ $infos->res_adresse1 }}" id="res_adresse1" name="res_adresse1" required>
                                            <span class="form-text text-muted">Nom et Numero de la rue*:</span>
                                        </div><br>
                                        
                                        <div class="input-form">
                                            <select class="form-control" name="res_province" id="res_province" required>
                                               <option value="{{$infos->res_province}}">{{$infos->res_province}}</option>
                                               <option value="Alberta">Alberta</option>
                                               <option value="Colombie-Britanique">Colombie-Britanique</option>
                                               <option value="Manitoba">Manitoba</option>
                                               <option value="Nouveau-Brunswick">Nouveau-Brunswick</option>
                                               <option value="Terre Neuve et Labrador">Terre Neuve et Labrador</option>
                                               <option value="Territoires du Nord-Ouest">Territoires du Nord-Ouest</option>
                                               <option value="Nouvelle-Ecosse">Nouvelle-Ecosse</option>
                                               <option value="Nunavut">Nunavut</option>
                                               <option value="Ontario">Ontario</option>
                                               <option value="Ile du Prince Edouard">Ile du Prince Edouard</option>
                                               <option value="Québec">Québec</option>
                                               <option value="Saskatchewan">Saskatchewan</option>
                                               <option value="Yukon">Yukon</option>
                                            </select>
                                            <span class="form-text text-muted">Votre province*:</span>
                                        </div><br>
                                        <div class="input-form">
                                            <input class="form-control" type="text" value="{{ $infos->res_code_postal }}" id="res_code_postal" name="res_code_postal" required>
                                            <span class="form-text text-muted">code postal de la residence*:</span>
                                        </div><br>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-primary">Modifier</button>
                                    </div>
                            </form>
                        @elseif(Auth::user()->role == "edimestre" || Auth::user()->role == "administrateur")
                        <form class="kt-form" method="POST" action="{{ route('profile.admin') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                <div class="input-form">
                                    <input class="form-control" type="hidden" value="{{ Auth::user()->id }}" id="id" name="id">
                                    <input class="form-control" type="text" value="{{ Auth::user()->name }}" id="name" name="name" required>
                                    <span class="form-text text-muted">Noms de l'administrateur*:</span>
                                </div><br>
                                <div class="input-form">
                                    <input class="form-control" type="text" value="{{ Auth::user()->phone }}" id="phone" name="phone" required>
                                    <span class="form-text text-muted">Telephone de l'administrateur*:</span>
                                </div><br>
                                </div>
                                <div class="col-lg-6">
                                    <div class="input-form">
                                        <input class="form-control" type="text" value="{{ Auth::user()->email }}" id="email"  name="email" required>
                                        <span class="form-text text-muted">Email de l'administrateur*:</span>
                                    </div><br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </div>
                        </form>
                        @else
                        @endif
                            
                </div>  
                     </div>
                    </div>
                    </div>
                </div>
                        
                    </div>
                        
                    </div> 
                </div>
				<!-- end:: Content -->
			</div>
		</div>
    </div>

@endsection
<div class="modal fade" id="kt_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Changez votre mot de passe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form class="kt-form" method="POST" action="{{route('user.modifier_password')}}">
                    @csrf
                    <div class="input-group">
                        <input class="form-control" type="hidden" value="{{Auth::user()->id}}" name="id" required>
                    </div>
                    <div class="input-group">
                        <input class="form-control" type="password" placeholder="Mot de passe actuel" name="current_password" autocomplete="off" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input class="form-control" type="password" placeholder="Nouveau mot de passe" name="password" autocomplete="off" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <input class="form-control" type="password" placeholder="Confirmez nouveau Mot de passe" name="repassword" autocomplete="off" required>
                    </div>
                    <br>
                    <div class="kt-login__actions">
                        <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Enregistrer</button>
                    </div>
                </form>


            </div>  
        </div>
    </div>
</div>