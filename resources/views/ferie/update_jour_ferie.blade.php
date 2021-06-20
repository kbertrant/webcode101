@extends('main')

@section('title', ' Modifier un jour férié')


@section('main-content')

<!-- end:: Header -->
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
    <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

            <!-- begin:: Subheader -->
								<div class="kt-subheader   kt-grid__item" id="kt_subheader">
									<div class="kt-subheader__main">
										<h3 class="kt-subheader__title">Férié</h3>
                                        <h4 class="kt-subheader__desc">Modifier un jour férié</h4>
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
                                     <form class="kt-form" method="POST" action="{{ route('ferie.update') }}">
                                        <div class="kt-portlet__body">
                                            @csrf
                                            <input type="hidden" class="form-control" value="{{$joursferies->id}}" id="id" name="id">
                                            <div class="form-group row">
                                                <div class="col-lg-6">
                                                    <label>Nom du férié*:</label>
                                                <input type="text" class="form-control" value="{{$joursferies->name_ferie}}" id="name_ferie" name="name_ferie">
                                                    <br>
                                                    
                                                </div>
                                                <div class="col-lg-6">
                                                    <label class="">Jour férié*:</label>
                                                    <input type="date" class="form-control" value="{{$joursferies->date_ferie}}" id="date_ferie" name="date_ferie">
                                                    <br>
                                                
                                                </div>
                                            </div>

                                            <div class="kt-portlet__foot">
                                                <div class="kt-form__actions">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <button type="submit" class="btn btn-success">Modifier</button>
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