@extends('main')

@section('title', ' Etat changement Quart')


@section('main-content')

	<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
		<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

			<!-- begin:: Subheader -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">Changement d'état des quarts</h3>
                        <h4 class="kt-subheader__desc">Liste des etats des quarts</h4>
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
                                    Date de changement d'etat des quarts
                                </h3>
                            </div>
                            
                        </div>

                        <div class="kt-portlet">
                            <!--begin: Datatable -->
                            <table class="kt-datatable">
                                <thead>
                                    <tr>
                                        <th>Titre</th>
                                        <th>Résidence</th>
                                        <th>Date création</th>
                                        <th>Date acceptation</th>
                                        <th>Date réalisation</th>
                                        <th>Date validation</th>
                                        <th>Date annulation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dates as $item)
                                    <tr>
                                        <td>{{$item->titre}}</td>
                                        <td>{{$item->res_name}}</td>
                                        <td>{{$item->date_creation}}</td>
                                        <td>{{$item->date_acceptation}}</td>
                                        <td>{{$item->date_realisation}}</td>
                                        <td>{{$item->date_validation}}</td>
                                        <td>{{$item->date_annulation}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end: Datatable -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection