@extends('main')

@section('title', ' Facturation')

<style>
    .results tr[visible='false'], .no-result{
        display: none;
    }
    .results tr[visible='true']{
        display: table-row;
    }
    .counter{
        padding: 8px;
        color: #acacac;
    }
</style>

@section('main-content')

    <!-- end:: Header -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
        <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

            <!-- begin:: Subheader -->
                <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                    <div class="kt-subheader__main">
                        <h3 class="kt-subheader__title">Facturation</h3>
                        <h4 class="kt-subheader__desc">Liste des facturations</h4>
                    </div>
                </div>
                <!-- end:: Subheader -->
                    <div class="row">
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
                                            <span>Rechercher</span>
                                        </span>
                                    </button>
                                    <button class="btn btn-primary" id="refresh">
                                        <span>
                                                <span>R??initialiser</span>
                                        </span>
                                    </button>
                                    &nbsp;&nbsp;
                                </div>
                            </div>   
                    </div><br>

                <div class="kt-portlet__body">
                    <div class="kt-portlet kt-portlet--mobile">
                        <div class="kt-portlet__head kt-portlet__head--lg">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="kt-font-brand flaticon2-card"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Liste des facturations
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-wrapper">
                                    <div class="kt-portlet__head-actions">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="kt-portlet">
                            <!--begin: Datatable -->
                                <table class="table table-striped table-bordered results" id="kt_table_1">
                                    <thead>
                                        <tr>
                                            <th><small>Titre</th>
                                            <th><small>Date</th>
                                            <th><small>Poste</th>
                                            <th><small>Noms</th>
                                            <th><small>Etat</th>
                                            <th><small>R??sidence</th>
                                            <th><small>Hrs jour</th>
                                            <th><small>Hrs supp jour</th>
                                            <th><small>Taux jour</th>
                                            <th><small>Hrs soir</th>
                                            <th><small>Hrs supp soir</th>
                                            <th><small>Taux soir</th>
                                            <th><small>Hrs nuit</th>
                                            <th><small>Hrs supp nuit</th>
                                            <th><small>Taux nuit</th>
                                            <th><small>Temps repas</th>
                                            <th><small>Facteur</th>
                                            <th><small>Total (en $ CAN)</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                            <!--end: Datatable -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.search').keyup(function(){
                var searchTerm = $(".search").val();
                var listItem = $('.results tboby').children('tr');
                var searchSplit = searchTerm.replace(/ /g, "'):containsi('");
                $.extend($.expr[':'], {
                    'containsi': function(elem,i,match,array){
                        return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "")
                        .toLowerCase()) >= 0;
                    }
                })
                $(".results tbody tr").not(":containsi('"+searchSplit+"')").each (function(){
                    $(this).attr('visible','false');
                })
                $(".results tbody tr:containsi('"+searchSplit+"')").each(function(){
                    $(this).attr('visible','true');
                })
                var jobCount = $('.results tbody tr[visible="true"]').length;
                $('.counter').text(jobCount + 'item');
                if(jobCount == 0){
                    $('no-results').show();
                }else{
                    $('no-results').hide();
                }
            })
        })
    </script>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
{{-- <link href="css/addons/datatables.min.css" rel="stylesheet">
<script type="text/javascript" src="js/addons/datatables.min.js"></script> --}}

<script>
    $(document).ready(function(){

    var date = new Date();

    $('.input-daterange').datepicker({
    todayBtn: 'linked',
    format: 'yyyy-mm-dd',
    autoclose: true
    });

    var _token = $('input[name="_token"]').val();

    load_data();

    function load_data(start = '', end = '')
    {
    $.ajax({
        url:"{{ route('facturation.load_data') }}",
            method:"POST",
            data:{start:start, end:end, _token:_token},
            dataType:"json",
        success:function(data)
        {
            var output = '';
            for(var count = 0; count < data.length; count++)
            {
            output += '<tr>';
            output += '<td><small>' + data[count].titre + '</td>';
            output += '<td><small>' + data[count].jour_debut+' '+ data[count].heure_debut+'-'+ data[count].heure_fin+' '+data[count].jour_fin + '</td>';
            output += '<td><small>' + data[count].post_name + '</small></td>';
            output += '<td><small>' + data[count].name + '</small></td>';
            output += '<td><small>' + data[count].quart_etat + '</small></td>';
            output += '<td><small>' + data[count].res_name + '<small></td>';
            output += '<td><small>' + data[count].heure_jour + '</small></td>';
            output += '<td><small>' + data[count].supp_jour + '<small></td>';
            output += '<td><small>' + data[count].tarif_jour + '</small></td>';
            output += '<td><small>' + data[count].heure_soir + '</small></td>';
            output += '<td><small>' + data[count].supp_soir + '</small></td>';
            output += '<td><small>' + data[count].tarif_soir + '</small></td>';
            output += '<td><small>' + data[count].heure_nuit + '</small></td>';
            output += '<td><small>' + data[count].supp_nuit + '</small></td>';
            output += '<td><small>' + data[count].tarif_nuit + '</small></td>';
            output += '<td><small>' + data[count].temps_repas + '</small></td>';
            output += '<td><small>' + data[count].facteur + '</small></td>';
            output += '<td><b>' + data[count].facturation_residence + '</b></td></tr>';
        }
        $('tbody').html(output);
    }
    })
    }

        $('#kt_search').click(function(){
            var start = $('#start').val();
            var end = $('#end').val();
            if(start != '' &&  end != '')
            {
                load_data(start, end);
            }
            else
            {
                alert('Pas de donn??es');
            }
        });
        $('#refresh').click(function(){
            $('#start').val();
            $('#end').val();
            load_data();
        });

    });
   
    /* $(document).ready(function(){
        $('#kt_table_1').dataTable({
            "pagingType": "simple_numbers"
        });
        $('.dataTables_length').addClass('bs-select');
    }); */
</script> 


