@extends('main')

@section('title', ' Modifier une résidence')


@section('main-content')

    <!-- end:: Header -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
        <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                <!-- begin:: Subheader -->
                <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                    <div class="kt-subheader__main">
                        <h3 class="kt-subheader__title">Résidence</h3>
                        <h4 class="kt-subheader__desc">Modifier une résidence</h4>
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
                                <form class="kt-form" method="POST" action="{{ route('residence.update') }}">
                                    <div class="kt-portlet__body">
                                        @csrf
                                        <input type="hidden" class="form-control" value="{{$residences->id}}" id="id" name="id">
                                        <input type="hidden" class="form-control" value="{{$residences->resp_id}}" id="resp_id" name="resp_id">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="{{$residences->res_name}}" id="res_name" name="res_name"> 
                                                <span class="form-text text-muted">Nom de la résidence*:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="{{$residences->res_phone}}" id="res_phone" name="res_phone"> 
                                                <span class="form-text text-muted">Téléphone résidence*:</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="{{$residences->name}}" id="name" name="name" required> 
                                                <span class="form-text text-muted">Noms et prenoms du responsable*:</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <input type="email" class="form-control" value="{{$residences->email}}" id="email" name="email" required>
                                                <span class="form-text text-muted">adresse email du responsable*:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="{{$residences->phone}}" id="phone" name="phone">
                                                <span class="form-text text-muted">Telephone Responsable residence*:</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" placeholder="Modifier mot de passe (facultatif)" id="password" name="password">
                                                <span class="form-text text-muted">votre mot de passe*:</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="status" id="status" required>
                                                    <option value="{{$residences->status}}">{{$residences->status}}</option>
                                                    <option value="activé">activé</option>
                                                    <option value="desactivé">Desactivé</option>
                                                </select> 
                                                <span class="form-text text-muted">Activer ou désactiver compte:*</span>
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                
                                                <input type="text" class="form-control" value="{{$residences->facture_name}}" id="facture_name" name="facture_name">   
                                                <span class="form-text text-muted">Noms Facturier*:</span>
                                            </div>
                                            <div class="col-md-6">
                                                
                                                <input type="text" class="form-control" value="{{$residences->facture_email}}" id="facture_email" name="facture_email">            
                                                <span class="form-text text-muted">Email Facturier*:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="{{$residences->facture_phone}}" id="facture_phone" name="facture_phone">  
                                                <span class="form-text text-muted">Telephone Facturier*:</span>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" value="{{$residences->res_temps_repas}}" id="res_temps_repas" name="res_temps_repas">  
                                                <span class="form-text text-muted">Temps de repas*:</span>
                                            </div>
                                            <div class="col-md-6">
                                
                                                <input type="text" class="form-control" value="{{$residences->res_adresse1}}" id="res_adresse1" name="res_adresse1">  
                                                <span class="form-text text-muted">Numéro & Nom de rue*:</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                
                                                <input type="text" class="form-control" value="{{$residences->res_adresse2}}" id="res_adresse2" name="res_adresse2">   
                                                <span class="form-text text-muted">Numéro Appartement:</span>
                                            </div>
                                            <div class="col-md-6">
                                                
                                                <input type="text" class="form-control" value="{{$residences->res_ville}}" id="res_ville" name="res_ville">            
                                                <span class="form-text text-muted">Ville :</span>
                                            </div>
                                        </div>
                                        <div class="form-group row"> 
                                            <div class="col-md-6">
                                                <select class="form-control" name="res_province" id="res_province" required>
                                                    <option value="{{$residences->res_province}}">{{$residences->res_province}}</option>
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
                                                <span class="form-text text-muted">Province :</span>
                                            </div>
                                            <div class="col-md-6">
                                                <label>Code postal:</label>
                                                <input type="text" class="form-control" value="{{$residences->res_code_postal}}" id="res_code_postal" name="res_code_postal">            
                                                <span class="form-text text-muted"> Code postal:</span>
                                            </div>
                                        </div>   
                                        <div class="kt-portlet__foot">
                                            <div class="kt-form__actions">
                                                <div class="row">
                                                    <div class="col-md-6">
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