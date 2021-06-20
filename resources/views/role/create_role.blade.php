@extends('main')

@section('title', ' Créer un role')


@section('main-content')
	<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
		<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

			<!-- begin:: Subheader -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">Role</h3>
                        <h4 class="kt-subheader__desc">Créer votre role</h4>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
					</div>
                </div>
                <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- end:: Subheader -->
                            <div class="kt-portlet">
                                <!--begin::Form-->
                                <form class="kt-form" method="POST" action="{{ route('role.store') }}">
                                    <div class="kt-portlet__body"> 
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                <label class="">Nom du role *:</label>
                                                <input type="text" class="form-control" placeholder="" id="role_name" name="role_name" required>
                                                
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="col-8 col-form-label">Professionnel de santé *</label>
												<div class="col-2">
													<span class="kt-switch kt-switch--sm kt-switch--icon">
														<label>
                                                            <input type="checkbox"  name="role_pro">
                                                            <span></span>
														</label>
													</span>
												</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-8 col-form-label">Résidence *</label>
												<div class="col-2">
													<span class="kt-switch kt-switch--sm kt-switch--icon">
														<label>
                                                            <input type="checkbox"  name="role_res">
                                                            <span></span>
														</label>
													</span>
												</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-8 col-form-label">Edimestre *</label>
												<div class="col-2">
													<span class="kt-switch kt-switch--sm kt-switch--icon">
														<label>
                                                            <input type="checkbox"  name="role_edimestre">
                                                            <span></span>
														</label>
													</span>
												</div>
                                            </div>
                                            <div class="col-lg-2">
                                                <label class="col-8 col-form-label">Administrateur *</label>
												<div class="col-2">
													<span class="kt-switch kt-switch--sm kt-switch--icon">
														<label>
                                                            <input type="checkbox" name="role_admin">
                                                            <span></span>
														</label>
													</span>
												</div>
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
                                    </form>

                                <!--end::Form-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:: content-->
                </div>
				<!-- end:: Content -->
			</div>
		</div>
    </div>
@endsection