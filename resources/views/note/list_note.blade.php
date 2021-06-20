@extends('main')

@section('title', ' Note')


@section('main-content')

    	<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
		<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

			    <!-- begin:: Subheader -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">Note</h3>
						<h4 class="kt-subheader__desc">Note des professionnels</h4>
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
                <div class="kt-portlet__body kt-portlet__body--fit">

                    <!--begin: Datatable -->
                    <table class="kt-datatable" id="html_table" width="100%">
                        <thead>
                            <tr>
                                <th title="Field #1">Nom professionel</th>
                                <th title="Field #2">Email</th>
                                <th title="Field #3">Poste</th>
                                <th title="Field #4">Nombres de quarts réalisés</th>
                                <th title="Field #5">Moyenne note</th>
                                <th title="Field #6"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notes as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->post_name}}</td>
                                <td>{{$item->nbre_quart}}</td>
                                <td>{{$item->moy_quart}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!--end: Datatable -->
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>
@endsection