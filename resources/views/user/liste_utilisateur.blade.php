@extends('main')

@section('title', ' Liste des utilisateurs')


@section('main-content')

    <!-- end:: Header -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
        <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                <!-- begin:: Subheader -->
                <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                    <div class="kt-subheader__main">
                        <h3 class="kt-subheader__title">Utilisateur</h3>
                        <h4 class="kt-subheader__desc">Liste des utilisateurs</h4>
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
                                    Liste des utilisateurs
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
                                        <a href="{{route('user.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                            <i class="la la-plus"></i>
                                                Nouveau utilisateur
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet">
                            
                                <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                </div>
                            <br><br>
                            <table class="kt-datatable">
                                <thead>
                                    <tr>
                                        <th title="Field #1">Nom et prénom</th>
                                        <th title="Field #2">Adresse email</th>
                                        <th title="Field #3">Téléphone</th>
                                        <th title="Field #4">Cle101</th>
                                        <th title="Field #5">Rôle</th>
                                        <th title="Field #6">Statut</th>
                                        <th title="Field #7">Actions</th>
                                        <th title="Field #8"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->cle101}}</td>
                                            <td>{{$item->role}}</td>
                                            <td>{{$item->status}}</td>
                                            <td>
                                                <a href="/user/edit/{{$item->id}}" data-toggle="tooltip"  data-id={{$item->id}} data-original-title="Update" class="btn btn-success btn-sm">Modifier</a>
                                                <a href="/user/destroy/{{$item->id}}" data-toggle="tooltip"  data-id={{$item->id}} data-original-title="Delete" class="btn btn-danger btn-sm">Supprimer</a>
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
