@extends('main')

@section('title', ' Envoi SMS')


@section('main-content')

<!-- end:: Header -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
        <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                <!-- begin:: Subheader -->
                <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                    <div class="kt-subheader__main">
                        <h3 class="kt-subheader__title">BulkSMS</h3>
                        <h4 class="kt-subheader__desc">Envoyer les SMS aux travailleurs</h4>
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
                        
                        <div class="container py-5 px-4">
                          
                            <form action='' method='post'>
                                @csrf
                                <label>Choisir les postes</label>
                                <select class="form-control m-select2" id="kt_select2_3" name="poste[]" multiple="multiple" required>
                                    <option value="1">Prepose aux beneficiaires</option>
                                    <option value="2">Loi 90</option>
                                    <option value="3">Infirmiere Aux.</option>
                                    <option value="4">Infirmiere</option>
                                  </select>   
                  
                              <label>Message</label>
                              <textarea class="form-control" rows="5" name='message' required></textarea>
                                <br>
                              <button class="btn btn-success" type='submit'>Envoyer !</button>
                        </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>

@endsection
<script src="{{asset('assets/app/custom/general/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>