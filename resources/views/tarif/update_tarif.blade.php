@extends('main')

@section('title', ' Modifier un tarif')


@section('main-content')

    <!-- end:: Header -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
        <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                <!-- begin:: Subheader -->
                <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                    <div class="kt-subheader__main">
                        <h3 class="kt-subheader__title">Tarif</h3>
                        <h4 class="kt-subheader__desc">Modifier une tarification</h4>
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
                                <form class="kt-form" method="POST" action="{{ route('tarif.update') }}">
                                    <div class="kt-portlet__body">
                                        @csrf
                                        <input type="hidden" class="form-control" value="{{$tarifs->id}}" id="id" name="id">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label class="">Residence</label>
                                                <select class="form-control" name="res_id" id="res_id" required>
                                                    @foreach ($residences as $item)
                                                        <option value="{{$item->id }}">{{$item->res_name }}</option>
                                                    @endforeach
                                                </select> 
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="">Poste</label>
                                                <select class="form-control" name="post_id" id="post_id" required>
                                                    @foreach ($postes as $item)
                                                        <option value="{{$item->id }}">{{$item->post_name }}</option>
                                                    @endforeach
                                                </select> 
                                            </div>      
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Tarif jour:</label>
                                                <input type="text" class="form-control" value="{{$tarifs->tarif_jour}}" id="tarif_jour" name="tarif_jour" required>  
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="">Tarif soir:</label>
                                                <input type="text" class="form-control" value="{{$tarifs->tarif_soir}}" id="tarif_soir" name="tarif_soir" required>   
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Tarif nuit:</label>
                                                <input type="text" class="form-control" value="{{$tarifs->tarif_nuit}}" id="tarif_nuit" name="tarif_nuit" required>            
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