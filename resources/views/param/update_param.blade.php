@extends('main')

@section('title', ' Modifier un paramètre')


@section('main-content')

<!-- end:: Header -->
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
    <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

            <!-- begin:: Subheader -->
			<div class="kt-subheader   kt-grid__item" id="kt_subheader">
				<div class="kt-subheader__main">
					<h3 class="kt-subheader__title">Paramètre</h3>
                    <h4 class="kt-subheader__desc">Modifier un paramètre</h4>
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
                            <form class="kt-form" method="POST" action="{{ route('param.update') }}">
                                <div class="kt-portlet__body">
                                @csrf
                                    <input type="hidden" class="form-control" value="{{$param->id}}" id="id" name="id">
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label class="">Nom du paramètre</label>
                                            <input type="text" class="form-control" value="{{$param->param_name}}" id="param_name" name="param_name"> 
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="">Valeur du paramètre</label>
                                            <input type="text" class="form-control" value="{{$param->param_value}}" id="param_value" name="param_value"> 
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