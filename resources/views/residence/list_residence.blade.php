@extends('main')

@section('title', ' Liste résidence')


@section('main-content')
	<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
		<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

			    <!-- begin:: Subheader -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">Résidence</h3>
                        <h4 class="kt-subheader__desc">Liste des résidences</h4>
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
                </div><br>
                <div class="kt-portlet__body">
                    <div class="kt-portlet kt-portlet--mobile">
                         <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="kt-font-brand flaticon2-card"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Liste des résidences
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
                                        <th title="Field #1">Résidence</th>
                                        <th title="Field #2">Responsable résidence</th>
                                        <th title="Field #3">Téléphone du responsable</th>
                                        <th title="Field #4">Email</th>
										<th title="Field #5">Nom facturier</th>
										<th title="Field #6">Email Facturier</th>
                                        <th title="Field #7">Telephone</th>
                                        <th title="Field #8">Temps repas</th>
                                        <th title="Field #9">Numéro & Nom de rue</th>
										<th title="Field #10">Numero Appartement</th>
                                        <th title="Field #11">Ville</th>
                                        <th title="Field #12">Province</th>
                                        <th title="Field #13">Code postal</th>
                                        <th title="Field #14">Actions</th>
                                        <th title="Field #15"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($residences as $item)
                                    <tr>
                                        <td>{{$item->res_name}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->res_phone}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->facture_name}}</td>
                                        <td>{{$item->facture_email}}</td>
                                        <td>{{$item->facture_phone}}</td>
                                        <td>{{$item->res_temps_repas}}</td>
                                        <td>{{$item->res_adresse1}}</td>
                                        <td>{{$item->res_adresse2}}</td>
                                        <td>{{$item->res_ville}}</td>
                                        <td>{{$item->res_province}}</td>
                                        <td>{{$item->res_code_postal}}</td>
                                        <td>
                                            <a href="/residence/edit/{{$item->id}}" data-toggle="tooltip"  data-id={{$item->id}} data-original-title="Update" class="btn btn-success btn-sm">Modifier</a>
                                            <a href="/residence/destroy/{{$item->id}}" data-toggle="tooltip"  data-id={{$item->id}} data-original-title="Delete" class="btn btn-danger btn-sm">Supprimer</a>
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