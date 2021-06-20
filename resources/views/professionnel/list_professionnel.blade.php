@extends('main')

@section('title', ' Liste des professionnels')


@section('main-content')
	<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
		<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

			<!-- begin:: Subheader -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">Professionnel</h3>
                        <h4 class="kt-subheader__desc">Liste des professionnels</h4>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
					</div>
				</div>
                <!-- end:: Subheader -->
                

                    <div class="row align-items-center">
                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                            <div class="kt-input-icon kt-input-icon--left">
                                <input type="text" class="form-control" placeholder="Rechercher par" id="generalSearch">
                                <span class="kt-input-icon__icon kt-input-icon__icon--left">
                                    <span><i class="la la-search"></i></span>
                                </span>
                            </div>
                        </div>
                        {{-- <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                            <div class="kt-form__group kt-form__group--inline">
                                
                                <div class="kt-form__control">
                                    <select class="form-control bootstrap-select" id="kt_form_status">
                                        <option value="">Titre</option>
                                        <option value="2">PAB</option>
                                        <option value="3">Loi90</option>
                                        <option value="4">Infirmier auxiliaire</option>
                                        <option value="5">Infirmé</option>
                                    </select>
                                </div>
                    </div>
                </div> --}}
                        {{-- <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                            <div class="kt-form__group kt-form__group--inline">
                                <div class="kt-form__control">
                                    <select class="form-control bootstrap-select" id="kt_form_status">
                                        <option value="">Statut du compte</option>
                                        <option value="1">crée</option>
                                        <option value="2">Validé</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
            </div><br>
            <div class="kt-portlet__body">
                    <div class="kt-portlet kt-portlet--mobile">
                         <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="kt-font-brand flaticon2-card"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Liste des professionnels
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="kt-portlet__head-actions">
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet">

                            <table class="kt-datatable">
                                <thead>
                                    <tr>
                                        <th title="Field #1">Noms & prénoms</th>
                                        <th title="Field #2">Téléphone</th>
                                        <th title="Field #3">Email</th>
                                        <th title="Field #3">Statut</th>
                                        <th title="Field #4">Diplôme</th>
                                        <th title="Field #5">Spécimen chèque</th>
                                        <th title="Field #6">Nombre d'années d'expérience</th>
                                        <th title="Field #7">Distance acceptable domicile-travail</th>
                                        <th title="Field #8">Pièce d'identité</th>
                                        <th title="Field #9">CV</th>
                                        <th title="Field #10">Titre Professionnel</th>
                                        <th title="Field #11">Carte RCR</th>
                                        <th title="Field #12">Attestation PDSB</th>
                                        <th title="Field #13">Numero pratique</th>
                                        <th title="Field #14">Langue</th>
										<th title="Field #15">Numéro & Nom de rue</th>
										<th title="Field #16">Numero Appartement</th>
                                        <th title="Field #17">Ville</th>
                                        <th title="Field #18">Province</th>
                                        <th title="Field #19">Code postal</th>
                                        <th title="Field #20">Condamnations</th>
                                        <th title="Field #22">Actions</th>            
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($professionnels as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td><small>{{$item->email}}</small></td>
                                        <td>{{$item->statut_employe}}</td>
                                        <td><a href="{{asset('/storage/app/public/diplome/'.$item->diplome_recent)}}">Diplome</a></td>
                                        <td><a href="{{asset('/storage/app/public/cheque/'.$item->specimen_cheque)}}">Chèque</a></td>
                                        <td>{{$item->annee_exp}}</td>
                                        <td>{{$item->dist_max}}</td>
                                        <td><a href="{{asset('/storage/app/public/identification/'.$item->carte_identite)}}">carte d'identité</a></td>
                                        <td><a href="{{asset('/storage/app/public/cv/'.$item->votre_cv)}}">CV</a></td>
                                        <td>{{$item->post_name}}</td>
                                        <td><a href="{{asset('/storage/app/public/carte_rcr/'.$item->carte_rcr)}}">Carte RCR</a></td>
                                        <td><a href="{{asset('/storage/app/public/attestation_pdsb/'.$item->attestation_pdsb)}}">Attestation</a></td>
                                        <td>{{$item->num_pratique}}</td>
                                
                                        <td>{{$item->langue}}</td>
                                        <td>{{$item->adresse1}}</td>
                                        <td>{{$item->adresse2}}</td>
                                        <td>{{$item->ville}}</td>
                                        <td>{{$item->province}}</td>
                                        <td>{{$item->code_postal}}</td>
                                        <td>{{$item->condamnations}}</td>
                                        <td>
                                            <a href="/professionnel/edit/{{$item->id}}" data-toggle="tooltip"  data-id={{$item->id}} data-original-title="Update" class="btn btn-success btn-sm">Modifier</a>
                                            <a href="/professionnel/destroy/{{$item->id}}" data-toggle="tooltip"  data-id={{$item->id}} data-original-title="Delete" class="btn btn-danger btn-sm">Supprimer</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end::Portlet-->
                        </div>
                    </div> 
                </div>
				<!-- end:: Content -->
			</div>
		</div>
    </div>
@endsection