@extends('main')

@section('title', ' Modifier un quart de travail')


@section('main-content')
	<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
		<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

			<!-- begin:: Subheader -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">Quart de travail</h3>
                        <h4 class="kt-subheader__desc">Modifier votre quart de travail</h4>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
					</div>
                </div>
                <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                    <div class="row">
                        <div class="col-lg-12">
                            
                            <!-- end:: Subheader -->
                            <div class="kt-portlet">
                                <!--begin::Form-->
                                <form class="kt-form" method="POST" action="{{ route('quart.update') }}">
                                    <div class="kt-portlet__body"> 
                                        @csrf
                                        <input type="hidden" class="form-control" value="{{$quart->id}}" id="id" name="id">
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <label>Poste à combler *</label>
                                                <select class="form-control" name="post_id" id="post_id">
                                                    <option value="{{ $poste->id }}">{{ $poste->post_name }}</option>
                                                    @foreach ($postes as $post)
                                                    
                                                        <option value="{{ $post->id }}">{{ $post->post_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Date de début*:</label>
                                                <input type="date" class="form-control" value="{{$quart->jour_debut}}" id="date_debut" name="date_debut">
                                            </div>
                                            @if($auth->role=="administrateur" ||$auth->role=="edimestre")
                                            <div class="col-md-2">
                                                <label>Assigner un personnel :</label>
                                                <select class="form-control" name="pro_id" id="pro_id">
                                                    @if($pro)
                                                    <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                                    @else
                                                    <option value="null">Choisir un professionnel</option>
                                                    @endif
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Choisir une résidence*:</label>
                                                <select class="form-control" name="res_id" id="res_id">
                                                    <option value="{{ $residence->id }}">{{ $residence->res_name }}</option>
                                                    @foreach ($residences as $residenc)
                                                    
                                                        <option value="{{ $residenc->id }}">{{ $residenc->res_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Masquer pour la résidence ?:</label>
                                                <select class="form-control" name="mask_residence" id="mask_residence" required>
                                                    <option value="{{ $quart->mask_residence }}">{{ $quart->mask_residence }}</option>
                                                    <option value="non">Non</option>
                                                    <option value="oui">Oui</option>
                                                </select>
                                            </div>
                                            @else
                                            @endif
                                        </div>
                                        <div class="form-group row">
                                            <div class="panel panel-primary col-md-6">
                                                <div class="panel-body">
                                                    <h3 class="text-on-pannel text-primary">Horaire</h3>
                                                    <div class="col-md-6">
                                                        <label class="">Heure de début*:</label>
                                                        <input type="time" class="form-control" value="{{$quart->heure_debut}}" id="heure_debut" name="heure_debut" required>
                                                    
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="">Heure de fin*:</label>
                                                        <div class="kt-input-icon">
                                                            <input type="time" class="form-control" value="{{$quart->heure_fin}}" id="heure_fin" name="heure_fin" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="">Facteur*:</label>
                                                <div class="kt-input-icon">
                                                    <input type="text" class="form-control" value="{{$quart->facteur}}" id="facteur" name="facteur" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label class="">Département*:</label>
                                                <div class="kt-input-icon">
                                                    <input type="text" class="form-control" value="{{$quart->departement}}" id="departement" name="departement" required>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Note :</label>
                                                <input type="text" class="form-control" value="{{$quart->note}}" name="note" id="note" >
                                            </div>
                                        </div>
                                        {{-- @if($role=="administrateur" ||$role=="edimestre") --}}
                                        <div class="form-group row">
                                            <div class="col-md-3">
                                                <label class="">Commentaires*:</label>
                                                <input type="text" class="form-control" value="{{$quart->commentaires}}" id="commentaires" name="commentaires" ></textarea>
                                                    
                                            </div>
                                            <div class="col-md-3">
                                                <label class="">Temps repas*:</label>
                                                <input type="text" class="form-control" value="{{$quart->temps_repas}}" id="temps_repas" name="temps_repas" />
                                                    
                                            </div>
                                            <div class="col-md-3">
                                                <label class="">Heure supplementaire*:</label>
                                                <input type="text" class="form-control" value="{{$quart->heure_sup}}" id="heure_sup" name="heure_sup" />
                                                    
                                            </div>
                                            <div class="col-md-3">
                                                <label class="">Etat du quart*:</label>
                                                <select class="form-control" id="quart_etat" name="quart_etat">
                                                    <option value="{{$quart->quart_etat}}">{{$quart->quart_etat}}</option>
                                                    <option value="Disponible">Disponible</option>
                                                    <option value="Accepté">Accepté</option>
                                                    <option value="Réalisé">Réalisé</option>
                                                    <option value="Annulé">Annulé</option>
                                                    <option value="Validé">Validé</option>
                                                </select>
                                                    
                                            </div>
                                        </div>	
                                        {{-- @else
                                        @endif --}}
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
                                    </form>

                                <!--end::Form-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:: content-->
                </div>
				<!-- end:: Content -->
			</div>
		</div>
    </div>
@endsection
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

<style>
    .text-on-pannel {
  background: #fff none repeat scroll 0 0;
  height: auto;
  margin-left: 10px;
  padding: 3px 5px;
  position: absolute;
  margin-top: -47px;
  border: 1px solid #337ab7;
  border-radius: 8px;
}

.panel {
  /* for text on pannel */
  margin-top: 27px !important;
  width: inherit;
}

.panel-body {
  padding-top: 20px !important;
  padding-left: 5px;
  padding-right: 5px;   

</style>
		
