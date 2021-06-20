@extends('main')

@section('title', ' Liste des fériés')


@section('main-content')

    <!-- end:: Header -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
        <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                <!-- begin:: Subheader -->
                                    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                                        <div class="kt-subheader__main">
                                            <h3 class="kt-subheader__title">Jour férié</h3>
                                            <h4 class="kt-subheader__desc">Liste des jours fériés</h4>
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
                                                        Liste des jours fériés
                                                    </h3>
                                                </div>
                                                <div class="kt-portlet__head-toolbar">
                                                    <div class="kt-portlet__head-wrapper">
                                                        <div class="kt-portlet__head-actions">
                                                        <a href="{{route('ferie.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                                                <i class="la la-plus"></i>
                                                                Nouveau jour férié
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-portlet">

                                                <table class="kt-datatable">
                                                    <thead>
                                                        <tr>
                                                            <th title="Field #1">Nom du férié</th>
                                                            <th title="Field #2">Date du férié</th>
                                                            <th title="Field #3">Actions</th>
                                                            <th title="Field #3"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($joursferies as $item)
                                                        <tr>
                                                            <td>{{$item->name_ferie}}</td>
                                                            <td>{{$item->date_ferie}}</td>
                                                            <td>
                                                                <a href="/jourferie/edit/{{$item->id}}" data-toggle="tooltip"  data-id={{$item->id}} data-original-title="Update" class="btn btn-success btn-sm">Modifier</a>
                                                                <a href="/jourferie/destroy/{{$item->id}}" data-toggle="tooltip"  data-id={{$item->id}} data-original-title="Delete" class="btn btn-danger btn-sm">Supprimer</a>
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
