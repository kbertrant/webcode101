@extends('main')

@section('title', ' Tarif')


@section('main-content')
	<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
		<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

			<!-- begin:: Subheader -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">Tarif</h3>
						<h4 class="kt-subheader__desc">Management des tarifs</h4>
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
                                    Liste des tarifs
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="kt-portlet__head-actions">
                                        <div class="dropdown dropdown-inline">
                                            <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="la la-download"></i> Exporter
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <ul class="kt-nav">
                                                    <li class="kt-nav__section kt-nav__section--first">
                                                        <span class="kt-nav__section-text">Choisir une option</span>
                                                    </li>
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon la la-print"></i>
                                                            <span class="kt-nav__link-text">Imprimer</span>
                                                        </a>
                                                    </li>
                                                    
                                                    <li class="kt-nav__item">
                                                        <a href="#" class="kt-nav__link">
                                                            <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                            <span class="kt-nav__link-text">PDF</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        &nbsp;
                                    <a href="{{route('tarif.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                            <i class="la la-plus"></i>
                                            Nouveau tarif
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet">

                            <table class="kt-datatable">
                                <thead>
                                    <tr>
                                        <th title="Field #1">Résidence</th>
										<th title="Field #2">Nom du poste</th>
										<th title="Field #3">Tarif jour</th>
										<th title="Field #4">Tarif soir</th>
                                        <th title="Field #5">Tarif nuit</th>
                                        <th title="Field #6">Actions</th>
                                        <th title="Field #7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tarifs as $item)
                                    <tr>
                                        <td>{{$item->res_name}}</td>
                                        <td>{{$item->post_name}}</td>
                                        <td>{{$item->tarif_jour}}</td>
                                        <td>{{$item->tarif_soir}}</td>
                                        <td>{{$item->tarif_nuit}}</td>
                                        <td>
                                            <a href="/tarif/edit/{{$item->id}}" data-toggle="tooltip"  data-id={{$item->id}} data-original-title="Update" class="btn btn-success btn-sm">Modifier</a>
                                            <a href="/tarif/destroy/{{$item->id}}" data-toggle="tooltip"  data-id={{$item->id}} data-original-title="Delete" class="btn btn-danger btn-sm">Supprimer</a>
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