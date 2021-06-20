@extends('main')

@section('title', ' Mes quarts')


@section('main-content')
	<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
		<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

			<!-- begin:: Subheader -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">Mes quarts de travail</h3>
						<h4 class="kt-subheader__desc">Liste de mes quarts de travail</h4>
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
                                    Liste de mes quarts de travail
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                        <table class="kt-datatable" id="html_table" > 
                            <div class="row align-items-center">
                                <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-form__group kt-form__group--inline">
                                        <label style="color: black">Date début:</label>
                                        <input type="date" class="form-control"  id="generalSearch">
                                    </div>
                                </div>
                                <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-form__group kt-form__group--inline">
                                        
                                        <div class="kt-form__control">
                                            <label style="color: black">Date fin:</label>
                                            <input type="date" class="form-control" id="generalSearch">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                    <div class="kt-form__group kt-form__group--inline">
                                        <label style="color: black"></label>
                                        <div class="kt-form__control">
                                            <button type="button" class="btn btn-success">Rechercher</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <thead>
                                <tr>
                                    <th title="Field #1">Titre</th>
                                    <th title="Field #2">Etat du quart de travail</th>
                                    <th title="Field #3">Poste à combler</th>
                                    <th title="Field #4">Nom résidence</th>
                                    <th title="Field #5">Jour </th>
                                    <th title="Field #6">Heure debut</th>
                                    <th title="Field #7">Heure fin</th>
                                    <th title="Field #8"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quart as $item)
                                <tr>
                                    <td><a href="/quart/show/{{$item->quart_id}}">{{$item->titre}}</a></td>
                                    <td>{{$item->quart_etat}}</td>
                                    <td>{{$item->post_name}}</td>
                                    <td>{{$item->res_name}}</td>
                                    <td>{{$item->jour_debut}}</td>
                                    <td>{{$item->heure_debut}}</td>
                                    <td>{{$item->heure_fin}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        
                        </table>
                    </div> 
                </div>
                        <!--end::Portlet-->
                    </div>
                </div>
            </div>
        </div>
@endsection