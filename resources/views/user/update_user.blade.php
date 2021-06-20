@extends('main')

@section('title', ' Modifier un utilisateur')


@section('main-content')

    <!-- end:: Header -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
        <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                <!-- begin:: Subheader -->
                <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                    <div class="kt-subheader__main">
                        <h3 class="kt-subheader__title">Utilisateur</h3>
                        <h4 class="kt-subheader__desc">Modifier un utilisateur</h4>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                    </div>
                </div>
                <!-- end:: Subheader -->

                <!-- begin:: Content -->	
                <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <!--begin::Portlet-->
                            <div class="kt-portlet">
                                <!--begin::Form-->
                                <form class="kt-form" method="POST" action="{{ route('user.update') }}">
                                    <div class="kt-portlet__body">
                                        @csrf
                                        <input type="hidden" class="form-control" value="{{$users->id}}" id="id" name="id">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label>Nom et prénom*:</label>
                                                <input type="text" class="form-control" value="{{$users->name}}" id="name" name="name" required>
                                                <br>  
                                                <label>Numéro de téléphone*:</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" value="{{$users->phone}}" id="phone" name="phone" required>
                                                </div><br>
                                                <label>Mot de passe*:</label>
                                                <div class="input-group">
                                                <input type="password" class="form-control" placeholder="Modifier mot de passe (facultatif)" id="password" name="password">
                                                </div><br>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="">Email*:</label>
                                                <input type="text" class="form-control" value="{{$users->email}}" id="email" name="email" required>
                                                <br>
                                                <label class="">Rôle*:</label>
                                                <select class="form-control" name="role" id="role" required>
                                                    <option value="{{$users->role}}">{{$users->role}}</option>
                                                    <option value="administrateur">Administrateur</option>
                                                    <option value="residence">Residence</option>
                                                    <option value="professionnel">Professionnel</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label class="col-8 col-form-label">Activer ou désactiver compte:</label>
                                                <select class="form-control" name="status" id="status" required>
                                                    <option value="{{$users->status}}">{{$users->status}}</option>
                                                    <option value="activé">activé</option>
                                                    <option value="desactivé">Desactivé</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="kt-portlet__foot">
                                            <div class="kt-form__actions">
                                                <div class="row">
                                                    <div class="col-md-6">
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