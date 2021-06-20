@extends('main')

@section('title', ' Modifier un professionnel')


@section('main-content')

<!-- end:: Header -->
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
    <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

            <!-- begin:: Subheader -->
			<div class="kt-subheader   kt-grid__item" id="kt_subheader">
				<div class="kt-subheader__main">
					<h3 class="kt-subheader__title">Professionnel</h3>
                    <h4 class="kt-subheader__desc">Modifier un professionnel</h4>
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
				</div>
			</div>
            <!-- end:: Subheader -->
             <!-- begin:: Content -->	
			<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                <div class="row">
                    <div class="col-lg-12">
                        <br>
                        <!--begin::Portlet-->
                        <div class="kt-portlet">    
                            <!--begin::Form-->
                            <form class="kt-form" method="POST" enctype="multipart/form-data" action="{{ route('professionnel.update') }}">
                                <div class="kt-portlet__body">
                                    @csrf
                                    <input type="hidden" class="form-control" value="{{$professionnels->id}}" id="id" name="id">
                                    <input type="hidden" class="form-control" value="{{$professionnels->cle101}}" id="cle101" name="cle101">
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <select class="form-control" name="statut_employe" id="statut_employe" required>
                                                <option value="{{$professionnels->statut_employe}}">{{$professionnels->statut_employe}}</option>
                                                <option value="Employé">Employé</option>
                                                <option value="Travailleur autonome">Travailleur autonome</option>
                                            </select>
                                            <span class="form-text text-muted">votre statut*:</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" value="{{$professionnels->name}}" id="name" name="name" required> 
                                            <span class="form-text text-muted">vos noms et prenoms*:</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" value="{{$professionnels->email}}" id="email" name="email" required>
                                            <span class="form-text text-muted">votre adresse email*:</span>
                                        </div>
                                    </div>

                                    <div class="input-group">
                                            <input class="form-control" type="hidden" value="professionnel"  id="role" name="role">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <input type="password" class="form-control" placeholder="Modifier mot de passe (facultatif)" id="password" name="password">
                                            <span class="form-text text-muted">votre mot de passe*:</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <select class="form-control" name="status" id="status" required>
                                                <option value="{{$professionnels->status}}">{{$professionnels->status}}</option>
                                                <option value="activé">activé</option>
                                                <option value="desactivé">Desactivé</option>
                                            </select> 
                                            <span class="form-text text-muted">Activer ou désactiver compte:*:</span>
                                        </div>
                                    </div> 
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" value="{{$professionnels->phone}}" id="phone" name="phone" required>
                                            <span class="form-text text-muted">votre telephone*:</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" value="{{$professionnels->dist_max}}" id="dist_max" name="dist_max" required> 
                                            <span class="form-text text-muted">Distance acceptable domicile-travail*:</span>
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group row">
                                        <div class="col-lg-6"> 
                                            <input type="text" class="form-control" value="{{$professionnels->annee_exp}}" id="annee_exp" name="annee_exp" required> 
                                            <span class="form-text text-muted">Nombre d'années d'expérience*:</span>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" value="{{$professionnels->num_pratique}}" id="num_pratique" name="num_pratique">
                                            <span class="form-text text-muted">Numero pratique*:</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6"> 
                                            <div class="input-form">
                                                <input type="file" class="form-control" value="{{$professionnels->specimen_cheque}}" id="specimen_cheque" name="specimen_cheque">
                                                <span class="form-text text-muted">Specimen cheque*:</span>
                                            </div> 
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-form">
                                                <input type="file" class="form-control" value="{{$professionnels->votre_cv}}" id="votre_cv" name="votre_cv">
                                                <span class="form-text text-muted">votre CV*:</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6"> 
                                            <div class="input-form">
                                                <input type="file" class="form-control" value="{{$professionnels->photo}}" id="photo" name="photo">
                                                <span class="form-text text-muted">votre photo*:</span>
                                            </div>
                                        </div>
                                    <div class="col-lg-6">
                                        <div class="input-form">
                                            <input type="file" class="form-control" value="{{$professionnels->diplome_recent}}" id="diplome_recent" name="diplome_recent">
                                            <span class="form-text text-muted">votre diplome recent*:</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6"> 
                                        <div class="input-form">
                                            <input type="file" class="form-control" value="{{$professionnels->carte_identite}}" id="carte_identite" name="carte_identite">
                                            <span class="form-text text-muted">votre carte d'identification*:</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-form diff">
                                            <input type="file" class="form-control" value="{{$professionnels->carte_rcr}}" id="carte_rcr" name="carte_rcr">
                                            <span class="form-text text-muted">votre carte RCR*:</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6"> 
                                        <div class="form-group row">
                                            <select class="form-control" id="post_id" name="post_id" required>
                                                <option value="{{$professionnels->post_id}}">{{$professionnels->post_name}}</option>
                                                @foreach ($postes as $poste)
                                                    <option value="{{ $poste->id }}">{{ $poste->post_name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="form-text text-muted">votre poste*:</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-form diff">
                                            <input type="file" class="form-control" value="{{$professionnels->attestation_pdsb}}" id="attestation_pdsb" name="attestation_pdsb">
                                            <span class="form-text text-muted">votre attestation PDSB:</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6"> 
                                        <div class="form-group row">
                                            <select class="form-control" value="" name="langue" id="langue" required>
                                                <option value="{{$professionnels->langue}}">{{$professionnels->langue}}</option>
                                                <option value="Français">Français</option>
                                                <option value="Anglais">Anglais</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align:center">Adresse</div><br>
                                    <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label class="">Nom & Numero Rue:</label>
                                        <input type="text" class="form-control" value="{{$professionnels->adresse1}}" id="adresse1" name="adresse1" required>   
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="">Numero Appartement:</label>
                                        <input type="text" class="form-control" value="{{$professionnels->adresse2}}" id="adresse2" name="adresse2">   
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Ville:</label>
                                        <input type="text" class="form-control" value="{{$professionnels->ville}}" id="ville" name="ville" required>            
                                    </div>
                                </div>
                                <div class="form-group row"> 
                                    <div class="col-lg-6">
                                        <select class="form-control" name="province" id="province" required>
                                            <option value="{{$professionnels->province}}">{{$professionnels->province}}</option>
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
                                    </div>
                                <div class="col-lg-6">
                                    <label>Code postal:</label>
                                    <input type="text" class="form-control" value="{{$professionnels->code_postal}}" id="code_postal" name="code_postal" required>            
                                </div>
                            </div> 
                            <div class="form-group row"> 
                                <div class="col-lg-6">
                                    <label>Condamnations:</label>
                                    <select class="form-control" value="" name="condamnations" id="condamnations" required>
                                        <option value="{{$professionnels->condamnations}}">{{$professionnels->condamnations}}</option>
                                        <option value="oui">Oui</option>
                                        <option value="non">Non</option>
                                    </select>            
                                </div>
                            </div>      
                            <div class="kt-portlet__foot">
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-success">Enregistrer</button>
                                            <button type="reset" class="btn btn-secondary">Annuler</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--end::Form-->
                </div>
            <!--end:: content-->
                </div>
            </div>
        </div>
    </div>
</div>
                                
@endsection