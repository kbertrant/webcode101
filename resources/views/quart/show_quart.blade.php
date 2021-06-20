@extends('main')

@section('title', ' Détail Quart de travail')


@section('main-content')
	<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
		<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

			<!-- begin:: Subheader -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">Quart de travail sélectionné</h3>
                        <h4 class="kt-subheader__desc">Informations sur le quart de travail</h4>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
					</div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="kt-font-brand flaticon2-card"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Titre {{$quart->titre}}
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="kt-portlet__head-actions">
                                        @if($auth->role=="administrateur" || $auth->role=="edimestre")
                                            <a href="/quart/edit/{{$quart->id}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                                <i class="la la-update"></i>
                                                    Modifier
                                            </a>
                                        @else
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding: 30px">
                            <div class="col-md-4" >
                                <h2>Quart de travail </h2>
                                <h6>Jour : <b>{{$quart->jour_debut}}</b> au <b>{{$quart->jour_fin}}</b></h6>
                                <h6>Heures : <b>{{$quart->heure_debut}}</b> à <b>{{$quart->heure_fin}}</b></h6>
                                <h6>Etat : <b>{{$quart->quart_etat}}</b> </h6>
                                <h6>Poste à combler : <b>{{$poste->post_name}}</b> </h6>
                                <h6>Département : <b>{{$quart->departement}}</b> </h6>
                                @if($auth->role=="residence")
                                    <h6>Note : <b>{{$quart->note ?? 'Pas de note'}}</b> </h6>
                                    <h6>Commentaire : <b>{{$quart->commentaires ?? 'Pas de commentaires'}}</b> </h6>
                                @endif
                                @if($auth->role=="administrateur")
                                    <h6>Facteur : <b>{{$quart->facteur}}</b> </h6>
                                    <h6>Heure(s) supplémentaires : <b>{{$quart->heure_sup}}</b> </h6>
                                    <h6>Temps repas : <b>{{$quart->temps_repas}}</b> </h6>
                                    <h6>Note : <b>{{$quart->note ?? 'Pas de note'}}</b> </h6>
                                    <h6>Commentaire : <b>{{$quart->commentaires ?? 'Pas de commentaires'}}</b> </h6>
                                    <h6>Taux jour : <b>{{$poste->post_tarif_jour}} $/h</b> </h6>
                                    <h6>Taux soir : <b>{{$poste->post_tarif_soir}} $/h</b> </h6>
                                    <h6>Taux nuit : <b>{{$poste->post_tarif_nuit}} $/h</b> </h6>
                                    <h2>Suivi du quart</h2>
                                    @foreach ($date as $item)
                                    <h6>Par : <b>{{$item->name}}</b> | Etat : <b>{{$item->etatquart}}</b> | Date : <b>{{date('d M y, H:i',strtotime($item->date_etat))}}</b> </h6>
                                    @endforeach
                                @else
                                @endif
                            </div>
                                <div class="col-md-4">
                                    <h2>Résidence</h2>
                                    <h6>Nom : <b>{{$residence->res_name}}</b> </h6>
                                    <h6>Téléphone : <b>{{$residence->res_phone}}</b></h6>
                                    <h6>Adresse : <b>{{$residence->res_adresse1}}</b> </h6>
                                    <h6>Numero : <b>{{$residence->res_adresse2}}</b> </h6>
                                    <h6> Ville : <b>{{$residence->res_ville}}</b> </h6>
                                    <h6>Province : <b>{{$residence->res_province}}</b> </h6>
                                    <h6>Code postal : <b>{{$residence->res_code_postal}}</b> </h6>
                                </div>
                                <div class="col-md-4">
                                    <h2>Personne assignée</h2>
                                    @if($pro)
                                        <h6>Nom : <b>{{$pro->name}}</b> </h6>
                                        <h6>clé 101 : <b>{{$pro->cle101}}</b></h6>
                                        <h6>Téléphone : <b>{{$pro->phone}}</b></h6>
                                    @else
                                    @endif
                                    <form method="POST" action="{{route('quart.etat_change')}}">
                                        @csrf
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" value="{{$quart->id}}" id="quart_id" name="quart_id">
                                            </div>
                                            <div class="form-group">
                                                <label for="message-text" class="form-control-label">Etat du quart de travail:</label>
                                                <select class="form-control" id="quart_etat" name="quart_etat">
                                                    @if($auth->role=="administrateur" || $auth->role=="edimestre")
                                                        <option value="{{$quart->quart_etat}}">{{$quart->quart_etat}}</option>
                                                        <option value="Disponible">Disponible</option>
                                                        <option value="Accepté">Accepté</option>
                                                        <option value="Réalisé">Réalisé</option>
                                                        <option value="Annulé">Annulé</option>
                                                        <option value="Validé">Validé</option>
                                                    @else
                                                    @endif
                                                    @if($auth->role=="professionnel")
                                                    <option value="{{$quart->quart_etat}}">{{$quart->quart_etat}}</option>
                                                        @if($quart->quart_etat=="Disponible")
                                                            <option value="Accepté">Accepté</option>
                                                        @elseif($quart->quart_etat=="Accepté")
                                                            <option value="Réalisé">Réalisé</option>
                                                        @else
                                                        @endif
                                                    @elseif($auth->role=="residence")
                                                    <option value="{{$quart->quart_etat}}">{{$quart->quart_etat}}</option>
                                                        @if($quart->quart_etat=="Disponible")
                                                            <option value="Annulé">Annulé</option>
                                                        @elseif($quart->quart_etat=="Réalisé")
                                                            <option value="Validé">Validé</option>
                                                        @else
                                                        @endif
                                                    @endif
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="diff_heure">Heure supplémentaire*:</label>
                                                <select class="form-control diff" id="heure_sup" name="heure_sup">
                                                    <option value="{{$quart->heure_sup}}">{{$quart->heure_sup}}</option>
                                                    <option value="0">0</option>
                                                    <option value="1">1h</option>
                                                    <option value="2">2h</option>
                                                    <option value="3">3h</option>
                                                    <option value="4">4h</option>
                                                </select>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label class="diff_temps">Temps de repas*:</label>
                                                <input type="text" class="form-control diff" value="{{$quart->temps_repas}}" id="temps_repas" name="temps_repas">
                                            </div>
                                            <div class="form-group">
                                                <label class="diff_note">Attribuer une note*:</label>
                                                <select class="form-control diff" id="note" name="note">
                                                    <option value="1">* (1/5)</option>
                                                    <option value="2">** (2/5)</option>
                                                    <option value="3">*** (3/5)</option>
                                                    <option value="4">**** (4/5)</option>
                                                    <option value="5">***** (5/5)</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="diff_com">Commentaires*:</label>
                                                <textarea class="form-control diff" rows="3" value="" placeholder="Commentaire" id="commentaires" name="commentaires"></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Enregistrer</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                            <!--end::Portlet-->
                        </div>
                    </div> 
                </div>
				<!-- end:: Content -->
                </div>
                <!--end:: content-->
            </div>
			<!-- end:: Content -->
		</div>
	</div>
</div>

@endsection
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    
  
     
    $(document).ready(function(){
            
            var heure_sup = $('#heure_sup').hide();
            var temps_repas = $('#temps_repas').hide();
            var note = $('#note').hide();
            var commentaires = $('#commentaires').hide();

            var heure = $('.diff_heure').hide();
            var temps = $('.diff_temps').hide();
            var note = $('.diff_note').hide();
            var commentaire = $('.diff_com').hide();
            //var attestation_pdsb = $('#attestation_pdsb').hide();
            $('#quart_etat').change(function(){
                var etat = $("#quart_etat option:selected").attr("value");
                if(etat=="Disponible"){
                    var heure_sup = $('#heure_sup').hide();
                    var temps_repas = $('#temps_repas').hide();
                    var note = $('#note').hide();
                    var commentaires = $('#commentaires').hide();

                    var heure = $('.diff_heure').hide();
                    var temps = $('.diff_temps').hide();
                    var note = $('.diff_note').hide();
                    var commentaire = $('.diff_com').hide();
                
                }else if(etat=="Accepté"){
                    var heure_sup = $('#heure_sup').hide();
                    var temps_repas = $('#temps_repas').hide();
                    var note = $('#note').hide();
                    var commentaires = $('#commentaires').hide();

                    var heure = $('.diff_heure').hide();
                    var temps = $('.diff_temps').hide();
                    var note = $('.diff_note').hide();
                    var commentaire = $('.diff_com').hide();
                    
                }else if(etat=="Réalisé"){
                    var heure_sup = $('#heure_sup').show();
                    var temps_repas = $('#temps_repas').show();
                    var note = $('#note').hide();
                    var commentaires = $('#commentaires').hide();

                    var heure = $('.diff_heure').show();
                    var temps = $('.diff_temps').show();
                    var note = $('.diff_note').hide();
                    var commentaire = $('.diff_com').hide();
                    
                }else if(etat=="Validé"){
                    var heure_sup = $('#heure_sup').show();
                    var temps_repas = $('#temps_repas').show();
                    var note = $('#note').show();
                    var commentaires = $('#commentaires').show();
                    $("#temps_repas").attr("disabled", true);
                    $("#heure_sup").attr("disabled", true);
                    var heure = $('.diff_heure').show();
                    var temps = $('.diff_temps').show();
                    var note = $('.diff_note').show();
                    var commentaire = $('.diff_com').show();
                    
                }
                console.log(etat);
            });
            
        });

</script>