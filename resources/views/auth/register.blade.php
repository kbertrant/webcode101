@extends('layouts.app')

@section('title', ' Inscription')
<link href="{{asset('build/css/intlTelInput.css')}}" rel="stylesheet" type="text/css" />

@section('content')
<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v3 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{asset('assets/media//bg/bg-3.jpg')}});">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    
                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title">Inscription</h3>
                            <div class="kt-login__desc">Choisissez votre profil et entrez vos informations:</div>
                        </div>
                        <ul class="nav nav-tabs center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#" data-target="#kt_tabs_1_1">Professionnel de santé</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tabs_1_2">Responsable de résidence</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_tabs_1_1" role="tabpanel">
                               <h5 style="text-align:center">Vous etes un professionnel de santé</h5>
                               <br>
                                <form class="kt-form" enctype="multipart/form-data" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div style="text-align:center">Informations personnelles</div>
                                            <div class="input-form">
                                                <select class="form-control" name="statut_employe" id="statut_employe" required>
                                                    <option value="">Statut du travailleur</option>
                                                    <option value="Employé">Employé</option>
                                                    <option value="Travailleur autonome">Travailleur autonome</option>
                                                </select>
                                                <span class="form-text text-muted">Statut du travailleur*:</span>
                                            </div>
                                            <div class="input-form">
                                                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" placeholder="Noms et prénoms" id="name" name="name" required autocomplete="name" autofocus>
                                                <span class="form-text text-muted">Noms et prenoms *:</span>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                           </div>
                                           <div class="input-form">
                                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" placeholder="Adresse email" id="email" name="email" required autocomplete="email">
                                                <span class="form-text text-muted">Adresse email *:</span>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            
                                            <div class="input-form">
                                                <input class="form-control" type="phone" placeholder="ex : (500) 101-0110" id="phone" name="phone" required>
                                                <span class="form-text text-muted">Votre numéro de téléphone *:</span>
                                            </div>
                                            <div class="input-form">
                                                <input class="form-control" type="hidden" value="professionnel"  id="role" name="role" >
                                            </div>
                                            <div class="input-form">
                                                <select class="form-control" name="langue" id="langue" required>
                                                   <option value="">Choisissez votre langue</option>
                                                   <option value="Français">Français</option>
                                                   <option value="Anglais">Anglais</option>
                                                </select>
                                                <span class="form-text text-muted">Langue de preference*:</span>
                                            </div>
                                            <div class="input-form">
                                                <input class="form-control" type="text" placeholder="Ex : 7 KM" id="dist_max" name="dist_max" required>
                                                <span class="form-text text-muted">Distance acceptable domicile-travail *:</span>
                                            </div>
                                            <div class="input-form">
                                                <input type="file" class="form-control" id="photo" name="photo" required>
                                                <span class="form-text text-muted">Votre photo de profil *:</span>
                                            </div>
                                            <div class="input-form">
                                                <input type="file" class="form-control" id="votre_cv" name="votre_cv" required>
                                                <span class="form-text text-muted">Envoyer votre CV *:</span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="text-align:center">Informations professionnelles</div>
                                            <div class="input-form">
                                                <select class="form-control" id="post_id" name="post_id" required>
                                                    <option value="">Votre titre professionnel</option>
                                                        @foreach ($postes as $poste)
                                                            <option value="{{ $poste->id }}">{{ $poste->post_name }}</option>
                                                        @endforeach
                                                </select>
                                                <span class="form-text text-muted">Votre titre professionnel*:</span>
                                            </div>
                                            <div class="input-form diff">
                                                <input type="file" class="form-control" id="carte_rcr" name="carte_rcr">
                                                 <span class="form-text text-muted">Envoyer votre carte RCR*:</span>
                                            </div>
                                            
                                            <div class="input-form num_pratiq">
                                                <input class="form-control" type="text" placeholder="Numero pratique" name="num_pratique" id="num_pratique">
                                                <span class="form-text text-muted num_pratiq">Numero pratique*:</span>
                                            </div>
                                            
                                            <div class="input-form diff">
                                                <input type="file" class="form-control" id="attestation_pdsb" name="attestation_pdsb">
                                                <span class="form-text text-muted">Envoyer votre attestation PDSB*:</span>
                                            </div>
                                            
                                            <div class="input-form">
                                                <input type="file" class="form-control" id="diplome_recent" name="diplome_recent" required>
                                                 <span class="form-text text-muted">Envoyer votre diplome le plus recent *:</span>
                                            </div>
                                            <div class="input-form">
                                                <input class="form-control" type="text" placeholder="Ex : 5 ans" id="annee_exp" name="annee_exp" required>
                                                <span class="form-text text-muted">Nombre d'années d'expérience*:</span>
                                            </div>
                                            
                                            <div class="input-form">
                                                <input type="file" class="form-control" id="carte_identite" name="carte_identite" required>
                                                 <span class="form-text text-muted">Envoyer votre carte d'identification*:</span>
                                            </div>
                                            <div class="input-form">
                                                <input type="file" class="form-control" id="specimen_cheque" data-browse="Parcourir" name="specimen_cheque" required>
                                                 <span class="form-text text-muted">Specimen cheque *:</span>
                                            </div>
                                        </div> 
                                    </div><br>
                                    <div style="text-align:center">Vos coordonnées</div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-form">    
                                                <input class="form-control" type="text" placeholder="Numéro & Nom de rue" name="adresse1" id="adresse1" required> 
                                                <span class="form-text text-muted">Numéro & Nom de rue*:</span>                                       
                                            </div>
                                            <div class="input-form">
                                                <input class="form-control" type="text" placeholder="Numero Appartement" name="adresse2" id="adresse2">
                                                <span class="form-text text-muted">Numéro appartement*:</span>
                                            </div>
                                            <div class="input-form">
                                                <select class="form-control" name="province" id="province" required>
                                                   <option value="">Choisissez une province</option>
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
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-form">
                                                <input class="form-control" type="text" placeholder="Votre ville" name="ville" id="ville" required>
                                                <span class="form-text text-muted">Votre ville*:</span>
                                            </div>
                                            <div class="input-form">
                                                <input class="form-control" type="text" placeholder="Votre code postal" name="code_postal" id="code_postal" required>
                                                <span class="form-text text-muted">Votre code postal*:</span>
                                            </div>
                                                                                  
                                        </div>
                                    </div><br>
                                    <div style="text-align:center">J'ai été condamné pour une infraction en vertu du code criminel du Canada</div><br>   
                                        <div class="row">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4 control-label">
                                                <div class="mt-radio-inline">
                                                    <label class="mt-radio">
                                                        <input type="radio" name="condamnations" id="Oui" value="oui" checked> Oui
                                                        <span></span>
                                                    </label>
                                                    <span></span>
                                                    <label class="mt-radio">
                                                        <input type="radio" name="condamnations" id="Non" value="non" checked> Non      
                                                        <span></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4"></div>
                                    </div>

                                    <div class="row kt-login__extra">
                                        <div class="col kt-align-left">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" required name="agree">J'accepte les <a href="#" class="kt-link kt-login__link kt-font-bold">termes and conditions</a>.
                                                <span></span>
                                            </label>
                                            <span class="form-text text-muted">
                                            @if(env('GOOGLE_RECAPTCHA_KEY'))
                                            <div class="g-recaptcha" name="recaptcha_response"
                                                data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                                            </div></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="kt-login__actions">
                                        <button type="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">S'inscrire</button>&nbsp;&nbsp;
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="kt_tabs_1_2" role="tabpanel">
                               <h5 style="text-align:center">Vous etes un responsable de résidence</h5>
                                <form class="kt-form" method="POST" action="{{ route('register') }}">
                                    @csrf <br>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div style="text-align:center">Responsable de la résidence</div>
                                            <div class="input-form">
                                                <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" placeholder="Nom du responsable résidence" id="name_resp" name="name" required>
                                                <span class="form-text text-muted">{{ __('Noms du responsable') }}*:</span>
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="input-form">
                                                <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" placeholder="Adresse email Responsable" id="email_resp"  name="email" required>
                                                <span class="form-text text-muted">{{ __('Email du responsable') }}*:</span>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="input-form">
                                                <input class="form-control" type="tel" placeholder=" ex:(504)254-1045" id="resp_phone" name="resp_phone" required>
                                                <span class="form-text text-muted">Telephone du responsable*:</span>
                                            </div>
                                            <div class="input-group">
                                                <input class="form-control" type="hidden" value="residence"  id="role" name="role" >
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div style="text-align:center">Informations de la résidence</div>
                                            <div class="input-form">
                                                <input class="form-control" type="text" placeholder="Nom de la résidence" id="res_name" name="res_name" required>
                                                <span class="form-text text-muted">Nom de la residence*:</span>
                                            </div>
                                            <div class="input-form">
                                                <input class="form-control" type="tel" placeholder="ex: (504)254-1045" id="res_phone" name="res_phone" required>
                                                <span class="form-text text-muted">Telephone de la residence*:</span>
                                            </div>
                                            <div class="input-form">
                                                <input class="form-control" type="text" placeholder="Ex: 30 minutes " id="res_temps_repas" name="res_temps_repas" required>
                                                <span class="form-text text-muted">Temps repas de la residence*:</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div style="text-align:center">Responsable de la facturation</div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-form">
                                                    <input class="form-control" type="text" placeholder="Nom responsable facturaion" id="name_fac" name="name_fac" required>
                                                    <span class="form-text text-muted">Noms du responsable de facturation*:</span>
                                                </div>
                                                <div class="input-form">
                                                    <input class="form-control" type="tel" placeholder="Téléphone facturation ex : (504)254-1045" name="fac_phone" id="fac_phone" required>
                                                    <span class="form-text text-muted">Telephone du responsable de facturation*:</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="input-form">
                                                    <input class="form-control" type="text" placeholder="Adresse email Facturation" id="email_fac" name="email_fac" required autocomplete="email" autofocus>
                                                    <span class="form-text text-muted">Email du responsable de facturation*:</span>
                                                </div>
                                            </div>
                                        </div>
                                    <br>
                                 <div style="text-align:center">Adresse de la résidence</div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="input-form">
                                                <input class="form-control" type="text" placeholder="Nom & numéro rue" name="res_adresse1" id="res_adresse1" required>
                                                <span class="form-text text-muted">Nom & numero de rue*:</span>
                                            </div>
                                            <div class="input-form">
                                                <input class="form-control" type="text" placeholder="Numero appartement" name="res_adresse2" id="res_adresse2">
                                                <span class="form-text text-muted">Numero d'appartement*:</span>
                                            </div>
                                            <div class="input-form">
                                                <select class="form-control" name="res_province" id="res_province" required>
                                                   <option value="">Choisissez une province</option>
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
                                                <span class="form-text text-muted">Province de la residence*:</span>
                                            </div>
                                        </div>
                                    <div class="col-lg-6">
                                        <div class="input-form">
                                            <input class="form-control" type="text" placeholder="Votre ville" name="res_ville" id="res_ville" required>
                                            <span class="form-text text-muted">Ville de la residence*:</span>
                                        </div>
                                        <div class="input-form">
                                            <input class="form-control" type="text" placeholder="Votre code postal" name="res_code_postal" id="res_code_postal" required>
                                            <span class="form-text text-muted">Code postal de la residence*:</span>
                                        </div>
                                    </div>
                                </div>
                            <div class="row kt-login__extra">
                                <div class="col kt-align-left">
                                    <label class="kt-checkbox">
                                        <input type="checkbox" name="agree" required>J'accepte les <a href="#" class="kt-link kt-login__link kt-font-bold">termes and conditions</a>.
                                        <span></span>
                                    </label>
                                    <span class="form-text text-muted"></span>
                                </div>
                            </div>
                            <div class="kt-login__actions">
                                <button id="submit" class="btn btn-brand btn-elevate kt-login__btn-primary">S'inscrire</button>&nbsp;&nbsp;
                            </div>
                        </form>
                            </div>
                        </div>
                        
                    </div>
                    <div class="kt-login__account">
                        <span class="kt-login__account-msg">
                            Vous avez un compte ?
                        </span>
                        &nbsp;&nbsp;
                        <a href="{{route('login')}}" class="kt-login__account-link">Connectez-vous !</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Page -->
@endsection
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'register'}).then(function(token) {
       ...
    });
});
</script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){

        var carte_rcr = $('.diff').hide();
        var numero_pratique = $('.num_pratiq').hide();
        //var attestation_pdsb = $('#attestation_pdsb').hide();
        $('#post_id').change(function(){
            var id = $("#post_id option:selected").attr("value");
            if(id==1 || id==2){
                $(numero_pratique).hide();
                $(carte_rcr).show();
                
            }else{
                $(numero_pratique).show();
                $(carte_rcr).hide(); 
                }
            console.log(id);
        });
            
    });
</script>