@extends('main')

@section('title', ' Modifier un poste')


@section('main-content')

<!-- end:: Header -->
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
    <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

            <!-- begin:: Subheader -->
								<div class="kt-subheader   kt-grid__item" id="kt_subheader">
									<div class="kt-subheader__main">
										<h3 class="kt-subheader__title">Poste</h3>
                                        <h4 class="kt-subheader__desc">Modifier un poste</h4>
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
                                    <form class="kt-form" method="POST" action="{{ route('poste.update') }}">
                                        <div class="kt-portlet__body">
                                            @csrf
                                            <input type="hidden" class="form-control" value="{{$postes->id}}" id="id" name="id">
                                            <div class="form-group row">
                            
                                                <div class="col-lg-6">
                                                    <label class="">Nom du poste</label>
                                                    <input type="text" class="form-control" value="{{$postes->post_name}}" id="post_name" name="post_name" required> 
                                                </div>

                                                <div class="col-lg-6">
                                                    <label class="">Niveau du poste</label>
                                                    <select class="form-control" name="post_level" id="post_level" required>
                                                       <option value="{{$postes->post_level}}">{{$postes->post_level}}</option>
                                                       <option value="1">1</option>
                                                       <option value="2">2</option>
                                                       <option value="3">3</option>
                                                       <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>Tarif jour:</label>
                                                    <input type="text" class="form-control" value="{{$postes->post_tarif_jour}}" id="post_tarif_jour" name="post_tarif_jour" required>  
                                                </div>

                                                <div class="col-lg-6">
                                                    <label class="">Tarif soir:</label>
                                                    <input type="text" class="form-control" value="{{$postes->post_tarif_soir}}" id="post_tarif_soir" name="post_tarif_soir" required>   
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>Tarif nuit:</label>
                                                    <input type="text" class="form-control" value="{{$postes->post_tarif_nuit}}" id="post_tarif_nuit" name="post_tarif_nuit" required>            
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
                                    <!--end::Form-->
                                </div>
                                <!--end:: content-->
                            </div>
                        </div>
                    </div>
                </div>
             </div>
                                
@endsection