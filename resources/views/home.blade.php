@extends('main')

@section('title', ' Calendrier')


@section('main-content')
	<!-- end:: Header -->
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
		<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
			<!-- begin:: Subheader -->
				<div class="kt-subheader   kt-grid__item" id="kt_subheader">
					<div class="kt-subheader__main">
						<h3 class="kt-subheader__title">Calendrier</h3>
						<h4 class="kt-subheader__desc">Code 101 vous souhaite la bienvenue</h4>
						@if(session()->has('success'))
							<div class="alert alert-success">
								{{ session()->get('success') }}
							</div>
						@endif
					</div>
				</div>
				<!-- end:: Subheader -->

				<!-- begin:: Content -->
				<div class="kt-content kt-grid__item kt-grid__item--fluid">

				<!--Begin::Dashboard 4-->

                <!--Begin::Section-->
				<div class="row">
				<!--begin:: calendar--> 
				@if($role=="professionnel" || $role=="residence")
				<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
					<div class="kt-portlet" id="kt_portlet">
						<div class="kt-portlet__head">
							<div class="kt-portlet__head-label">
								<span class="kt-portlet__head-icon">
									<i class="flaticon-calendar-2"></i>
								</span>
								<h3 class="kt-portlet__head-title">
									Calendrier de travail
								</h3>
							</div>
						</div>
						<div class="kt-portlet__body">
							<div id="kt_calendar"></div>
						</div>
					</div>
				</div>
				@else
                <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
					<div class="row">
						<div class="col-lg-12">
                            <ul class="nav nav-tabs center" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#" data-target="#kt_tabs_1_1">Calendrier</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_tabs_1_2">Liste</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_tabs_1_3">Carte</a>
                                </li>
							</ul>
                        </div>
                    <div class="col-lg-12">
					<!--begin::Portlet-->
					<div class="tab-content">
                        <div class="tab-pane active" id="kt_tabs_1_1" role="tabpanel">
                            <div class="kt-portlet" id="kt_portlet">
                                <div class="kt-portlet__head">

                                    <div class="kt-portlet__head-label">
                                        <span class="kt-portlet__head-icon">
                                            <i class="flaticon-calendar-2"></i>
                                        </span>
                                        <h3 class="kt-portlet__head-title">
                                            Calendrier de travail
                                        </h3>
                                    </div>
                                    
								</div>
								
                            	<div class="kt-portlet__body">
									<!-- end:: Subheader -->
									<div class="row ">
										<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
											   <div class="form-group pull-right">
												   <input type="text" class="search form-control" placeholder="Rechercher par">
												   <span class="counter pull-left">
												   </span>
											   </div>
										</div> 
									  
									   <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">     
										   <div class="input-group input-daterange" >
											   <input type="text" class="form-control kt-input" id="start" name="start" placeholder="From" readonly />
											   <div class="input-group-append">
												   <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
											   </div>
											   <input type="text" class="form-control kt-input" id="end" name="end" placeholder="To" readonly />
										   </div>
									   </div> 
									   <div class="kt-separator kt-separator--md kt-separator--dashed"></div>
										   <div class="row">
											   <div class="col-lg-12">
												   <button class="btn btn-primary" id="kt_search">
													   <span>
															   <span>Filtrer</span>
													   </span>
												   </button>
												   <button class="btn btn-primary" id="refresh">
													   <span>
															   <span>Réinitialiser</span>
													   </span>
												   </button>
												   &nbsp;&nbsp;
											   </div>
										   </div> 
								   </div>
								   <br>
									<span class="text-muted"><b>Nombre de quarts: {{$quart[0]->nbre_quart}}</b></span>
									<br>
                                	<div id="kt_calendar"></div>
                                </div>
                            </div>
						</div>
						
                    <div class="tab-pane" id="kt_tabs_1_2" role="tabpanel">
						<!--begin::Portlet-->
						<div class="kt-portlet">
                        <table class="kt-datatable" id="html_table" >
							
							<div class="row align-items-center">
                                <div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
                                </div>
                                <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                    <div class="input-group input-daterange">
                                        <input type="text" class="form-control kt-input" id="start" name="start" placeholder="Date debut" readonly />
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
                                        </div>
                                        <input type="text" class="form-control kt-input" id="end" name="end" placeholder="Date fin" readonly />
                                    </div>
                                </div>
                                <div class="kt-separator kt-separator--md kt-separator--dashed"></div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-primary" id="kt_search">
                                    <span>
                                            <span>Rechercher</span>
                                    </span>
								</button>
								<button class="btn btn-primary" id="refresh">
									<span>
											<span>Réinitialiser</span>
									</span>
								</button>
                                &nbsp;&nbsp;
                            </div>
                        </div>   
                    </div>
                                </div>

								<div class="col-md-3 kt-margin-b-20-tablet-and-mobile">
								</div>
							
							</div>
							<thead>
								<tr>
									<th title="Field #1">Titre</th>
									<th title="Field #2">Etat du quart de travail</th>
									<th title="Field #3">Poste à combler</th>
									<th title="Field #4">Nom résidence</th>
									<th title="Field #5">Professionnel de santé affecté</th>
									<th title="Field #6">Jour </th>
									<th title="Field #7">Heure debut</th>
									<th title="Field #8">Heure fin</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($quart as $item)
								<tr>
									<td><a href="/quart/show/{{$item->quart_id}}">{{$item->titre}}</a></td>
									<td>{{$item->quart_etat}}</td>
									<td>{{$item->post_name}}</td>
									<td>{{$item->res_name}}</td>
									<td>{{$item->name}}</td>
									<td>{{$item->jour_debut}}</td>
									<td>{{$item->heure_debut}}</td>
									<td>{{$item->heure_fin}}</td>
								</tr>
								@endforeach
							</tbody>
						
						</table>
					    <!--end::Portlet-->
				    </div></div>
                    <div class="tab-pane" id="kt_tabs_1_3" role="tabpanel">
                  	<!--begin::Portlet-->
					<div class="kt-portlet kt-portlet--tab">
						<div class="kt-portlet__head">
							<div class="kt-portlet__head-label">
								<h3 class="kt-portlet__head-title">
									Localisation des quarts de travail
								</h3>
							</div>
						</div>
						<div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d41306296.48766045!2d-130.17484359298254!3d50.81011405904711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4b0d03d337cc6ad9%3A0x9968b72aa2438fa5!2sCanada!5e0!3m2!1sfr!2scm!4v1576497451700!5m2!1sfr!2scm" width="980" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
											<!--<div id="kt_jqvmap_world" class="kt-jqvmap" style="height:300px;"></div>-->
						</div>
					</div>
					<!--end::Portlet-->
                </div>
		    </div>
	        <!--end::Portlet-->		
		</div>
	</div>
</div>
@endif
<!--end:: calendar-->
</div>
<h5>Legende :</h5>
<h6><i class="flaticon-star"></i> : Quart de travail payé en temps supplémentaire</h6>
<h6><i class="flaticon-star"></i><i class="flaticon-star"></i> : Quart de travail payé en temps double</h6>
<h6><span style="color:#fff;">blanc:</span> Quart de travail expiré</h6>
<h6><span style="color:#9afff4;">vert:</span> Quart de travail disponible</h6>
<h6><span style="color:#f99aff;">violet:</span> Quart de travail validé</h6>
<h6><span style="color:#ff9a9a;">rouge:</span> Quart de travail accepté</h6>
<h6><span style="color:#9f9aff;">bleu:</span> Quart de travail réalisé</h6>
<!--End::Section-->
<!--End::Dashboard 4-->
</div>

<!-- end:: Content -->
</div>
</div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<script>
	$(document).ready(function(){
	
	 var date = new Date();
	
	 $('.input-daterange').datepicker({
	  todayBtn: 'linked',
	  format: 'yyyy-mm-dd',
	  autoclose: true
	 });
	
	 var _token = $('input[name="_token"]').val();
	
	 getData();
	
	 function getData(start = '', end = '')
	 {
	  $.ajax({
		url:"quart/data",
			method:"POST",
			data:{start:start, end:end, _token:_token},
			dataType:"json",
		success:function(data)
		{
			//console.log(data);
	   	}
	  });
	 }
	
		$('#kt_search').click(function(){
			var start = $('#start').val();
			var end = $('#end').val();
			if(start != '' &&  end != '')
			{
				getData(start, end);
			}
			else
			{
				alert('Pas de données');
			}
		});
		$('#refresh').click(function(){
			$('#from_date').val();
			$('#to_date').val();
			getData();
		});
	
	});
</script>
<script type="text/javascript">
	var map;

$(document).ready(function() {
	
	geoLocationInit();
	function geoLocationInit() {
		if(navigator.geoLocalisation){
			navigator.geoLocalisation.getCurrentPosition(success,fail);
		}else{
			alert("Browser not supported");
		}	
	}

	function success() {
		console.log(position);
		var latval = position.coords.latitude;
		var lngval = position.coords.longitude;

		myLatLng = new google.maps.LatLng(latval, lngval);
		createMap(myLatLng);
	}

	function fail() {
		alert("it's fails");
	}

	function createMap() {
		map = new google.maps.Map(document.getElementById('map')), {
			center: myLatLng,
			zoom: 12
		});
		var marker = new google.maps.Marker({
			position: latlng,
			map: map
		}); 

	}

	function createMarker(latlng,icn,name) {
		var marker = new google.maps.Marker() {
			position: latlng,
			map: map,
			icon: icn,
			title: name
		});
	}

	function nearbySearch(myLatLng,type) {
		var request = {
			location: myLatLng,
			radius: '2500',
			types: ['type'],
			title: name
		};
		service = new google.maps.places.PlacesService(map);
		service.nearbySearch(request,callback);

		function callback(results, status){
			if(status == google.maps.places.PlacesService.OK){
				for(var i = 0; i<results.length; i++) {
					var place = results[i];
					console.log(place);
					latlng = place.geometry.location;
					icn = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png
					name = place.name;
					createMarker(latlng,icn,name);
				}
			}
		}
	}
});
</script>