@extends('main')

@section('title', ' Créer des quarts de travail')


@section('main-content')
	<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
		<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

			<!-- begin:: Subheader -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">Quart de travail</h3>
                        <h4 class="kt-subheader__desc">Créer des quarts de travail</h4>
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
                            <div class="kt-portlet ">
                                <!--begin::Form-->
                                <form class="kt-form" method="POST" action="{{ route('quart.store') }}">
                                    <div class="kt-portlet__body button"> 
                                        @csrf
                                        <div id="duplicate">
                                            <div class="kt-portlet__foot"></div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <label>Poste à combler *</label>
                                                    <select class="form-control" name="post_id[]" id="post_id[]" required>
                                                        <option value="">Choisir un poste</option>
                                                        @foreach ($postes as $poste)
                                                            <option value="{{ $poste->id }}">{{ $poste->post_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Date de début*:</label>
                                                    <input type="date" class="form-control" placeholder="" id="date_debut[]" name="date_debut[]" required>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-danger btn-sm btn-icon btn-circle" data-toggle="tooltip" title="Exemple pour un quart exécuté la nuit du 20/01/2020 à 23h30 au 21/01/2020 à 7h00, a bien débuté le 20/01/2020 à 23h30 pour s'achever le lendemain 21/01/2020 à 07h30">
                                                        <i class="flaticon-info"></i>
                                                    </button>
                                                </div>
                                                @if($auth->role=="administrateur" ||$auth->role=="edimestre")
                                                <div class="col-md-2">
                                                    <label>Assigner un personnel :</label>
                                                    <select class="form-control" name="pro_id[]" id="pro_id[]">
                                                        <option value="null">Choisir un professionnel</option>
                                                        @foreach ($users as $user)
                                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Choisir une résidence*:</label>
                                                    <select class="form-control" name="res_id[]" id="res_id[]" required>
                                                        <option value="">Choisir une résidence</option>
                                                        @foreach ($residences as $residence)
                                                            <option value="{{ $residence->id }}">{{ $residence->res_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Masquer pour la résidence ?:</label>
                                                    <select class="form-control" name="mask_residence[]" id="mask_residence[]" required>
                                                        <option value="non">Non</option>
                                                        <option value="oui">Oui</option>
                                                    </select>
                                                </div>
                                                @else
                                                @endif
                                            </div>

                                            <div class="form-group row">
                                                <div class="panel panel-primary col-md-6">
                                                    <div class="panel-body">
                                                      <h3 class="text-on-pannel text-primary">Horaire</h3>
                                                      <div class="col-md-6">
                                                        <label class="">Heure de début*:</label>
                                                        <input type="time" class="form-control" placeholder="" id="heure_debut[]" name="heure_debut[]" required>
                                                        
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="">Heure de fin*:</label>
                                                        <div class="kt-input-icon">
                                                            <input type="time" class="form-control" placeholder="" id="heure_fin[]" name="heure_fin[]" required>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-2">
                                                    <label class="">Département*:</label>
                                                    <div class="kt-input-icon">
                                                        <input type="text" class="form-control" placeholder="Département" id="departement[]" name="departement[]" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Ce quart est Urgent ? :</label>
                                                    <select class="form-control" name="urgent[]" id="urgent[]" required>
                                                        <option value="non">Non</option>
                                                        <option value="oui">Oui</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1">
                                                    <button type="button" class="btn btn-danger btn-sm btn-icon btn-circle" data-toggle="tooltip" title="Si le champ est considere comme urgent, son coefficient est 1.5" data-content="" data-original-title="">
                                                        <i class="flaticon-info"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>	
                                        <br/>
                                        <div class="field_wrapperEN">
                                            <div>
            
                                            </div>
                                        </div>			
                                        <div class="kt-portlet__foot"></div>
                                        <div class="form-group row">
                                            <div class="col-offset-md-2"></div>
                                            <div class="col-md-3 offset-md-3">
                                                <button type="button" onclick="dupliquer()" class="btn btn-success">Dupliquer ce quart</button>    
                                            </div>
                                            <div class="col-lg-4">
                                                <a href="javascript:void(0);" class="btn btn-success add_buttonEN">Ajouter un nouveau quart</a>   
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
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />

<script type="text/javascript">

    $(document).ready(function(){
        
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_buttonEN'); //Add button selector
        var wrapper = $('.field_wrapperEN'); //Input field wrapper
        var fieldHTML = '<div >'
        +'<div class="kt-portlet__foot"></div>'
        +'<div class="form-group row">'
        +'<div class="col-md-2">'
        +'<label>Poste à combler *</label>'
        +'<select class="form-control" name="post_id[]" id="post_id[]" required>'
        +'<option value="">Choisir un poste</option>'
        +'@foreach ($postes as $poste)'
        +'<option value="{{ $poste->id }}">{{ $poste->post_name }}</option>'
        +'@endforeach'
        +'</select>'
        +'</div>'
        +'<div class="col-md-2">'
        +'<label>Date de début*:</label>'
        +'<input type="date" class="form-control" placeholder="" id="date_debut[]" name="date_debut[]" required>'
        +'</div>'
        +'<div class="col-md-1">'
        +'<button type="button" class="btn btn-danger btn-sm btn-icon btn-circle" data-toggle="tooltip" title="Exemple pour un quart exécuté la nuit du 20/01/2020 à 23h30 au 21/01/2020 à 7h00, a bien débuté le 20/01/2020 à 23h30 pour se terminer le lendemain 21/01/2020 à 07h30">'
        +'<i class="flaticon-info"></i>'
        +'</button>'
        +'</div>'
        +'@if($auth->role=="administrateur" ||$auth->role=="edimestre")'
        +'<div class="col-md-2">'
        +'<label>Assigner un personnel *:</label>'
        +'<select class="form-control" name="pro_id[]" id="pro_id[]">'
        +'<option value="">Choisir un professionnel</option>'
        +'@foreach ($users as $user)'
        +'<option value="{{ $user->id }}">{{ $user->name }}</option>'
        +'@endforeach'
        +'</select>'
        +'</div>'
        +'<div class="col-md-2">'
        +'<label>Choisir une résidence*:</label>'
        +'<select class="form-control" name="res_id[]" id="res_id[]" required>'
        +'<option value="">Choisir une résidence</option>'
        +'@foreach ($residences as $residence)'
        +'<option value="{{ $residence->id }}">{{ $residence->res_name }}</option>'
        +'@endforeach'
        +'</select>'
        +'</div>'
        +'<div class="col-md-2">'
        +'<label>Masquer pour larésidence ?:</label>'
        +'<select class="form-control" name="mask_residence[]" id="mask_residence[]" required>'
        +'<option value="non">Non</option>'
        +'<option value="oui">Oui</option>'
        +'</select>'
        +'</div>'
        +'@else'
        +'@endif'
        +'</div>'
        +'<div class="form-group row">'
        +'<div class="panel panel-primary col-md-6">'
        +'<div class="panel-body">'
        +'<h3 class="text-on-pannel text-primary">Horaire</h3>'
        +'<div class="col-md-6">'
        +'<label class="">Heure de début*:</label>'
        +'<input type="time" class="form-control" placeholder="" id="heure_debut[]" name="heure_debut[]" required>'                                     
        +'</div>'
        +'<div class="col-md-6">'
        +'<label class="">Heure de fin*:</label>'
        +'<div class="kt-input-icon">'
        +'<input type="time" class="form-control" placeholder="" id="heure_fin[]" name="heure_fin[]" required>'
        +'</div>'
        +'</div>'
        +'</div>'
        +'</div>'
        +'<div class="col-md-2">'
        +'<label class="">Département*:</label>'
        +'<div class="kt-input-icon">'
        +'<input type="text" class="form-control" placeholder="Département" id="departement[]" name="departement[]" required>'
        +'</div>'
        +'</div>'
        +'<div class="col-md-2">'
        +'<label>Ce quart est Urgent ? :</label>'
        +'<select class="form-control" name="urgent[]" id="urgent[]" required>'
        +'<option value="non">Non</option>'
        +'<option value="oui">Oui</option>'
        +'</select>'
        +'</div>'
        +'</div>'
        +'<a href="javascript:void(0);" class="remove_buttonEN">'
        +'<img src="{{ asset('img/remove-icon.png') }}"/> ceci est un nouveau quart'
        +'</a>'
        +'<br/>'
        +'</div>';

        //Once add button is clicked
        


        var x = 1; //Initial field counter is 1
        
        //Once add button is clicked
        $(addButton).click(function(){
                
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });
            
        
        
        //Once remove button is clicked
        $(wrapper).on('click', '.remove_buttonEN', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });

        $('hutton').click(function (){
            //var ele = $(this).closest('.duplicate').clone(true);
            //$(this).closest('.duplicate').after(ele);

            $('.field_wrapperEN').append($('.duplicate').html());
        });

        
    });
    function dupliquer() { 
        var $form = $('#duplicate');
        var $el = $form.clone();
        var $originalSelects = $form.find('select');
        $el.find('select').each(function(index, item) {
            //set new select to value of old select
            $(item).val( $originalSelects.eq(index).val() );
        });
        //$($el).append()
        $($el).append('<a href="javascript:void(0);" class="remove_buttonEN">'
        +'<img src="{{ asset('img/remove-icon.png') }}"/> Ceci est un quart duplique'
        +'</a>');
        $('.field_wrapperEN').append($el); 
    }
</script>
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
</script>
<style>
    .text-on-pannel {
  background: #fff none repeat scroll 0 0;
  height: auto;
  margin-left: 10px;
  padding: 3px 5px;
  position: absolute;
  margin-top: -47px;
  border: 1px solid #337ab7;
  border-radius: 8px;
}

.panel {
  /* for text on pannel */
  margin-top: 27px !important;
  width: inherit;
}

.panel-body {
  padding-top: 20px !important;
  padding-left: 5px;
  padding-right: 5px;   

</style>