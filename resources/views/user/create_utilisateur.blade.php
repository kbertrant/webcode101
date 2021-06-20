@extends('main')

@section('title', ' Créer un utilisateur')


@section('main-content')

    <!-- end:: Header -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
        <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                <!-- begin:: Subheader -->
                <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                    <div class="kt-subheader__main">
                        <h3 class="kt-subheader__title">Utilisateur</h3>
                        <h4 class="kt-subheader__desc">Créer un utilisateur</h4>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                    </div>
                </div>
                                    <!-- end:: Subheader -->

                <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <!--begin::Portlet-->
                            <div class="kt-portlet">
                                <!--begin::Form-->
                                <form class="kt-form" method="POST" action="{{ route('user.store') }}">
                                    <div class="kt-portlet__body">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Nom et prénom*:</label>
                                                    <input type="text" class="form-control" placeholder="" id="name" name="name" required>
                                                    <br> 
                                                <label>Numéro de téléphone*:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="" id="phone" name="phone" required>
                                                </div><br>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="">Email*:</label>
                                                <input type="text" class="form-control" placeholder="" id="email" name="email" required>
                                                <br> 
                                                <label class="">Rôle*:</label>
                                                    <select class="form-control" name="role" id="role" required>
                                                        <option value="">Choisissez un rôle</option>
                                                        <option value="administrateur">Administrateur</option>
                                                        <option value="edimestre">Edimestre</option>
                                                        <option value="residence">Residence</option>
                                                        <option value="professionnel">Professionnel</option>
                                                    </select>
                                            </div>
                                        </div>
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection