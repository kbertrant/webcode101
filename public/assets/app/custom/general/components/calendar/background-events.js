"use strict";

var KTCalendarBackgroundEvents = function() {

    return {
        //main function to initiate the module
        init: function() {
            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

            $('#kt_calendar').fullCalendar({
                isRTL: KTUtil.isRTL(),
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                editable: true,
                eventLimit: false, // allow "more" link when too many events
                
                navLinks: true,
                businessHours: true, // display business hours
                events: "/quart/data", 
                eventClick: function(event) {
                    //alert('Event: ' + event.title);
                    location.href="quart/show/"+event.id;
                },
                eventRender: function(event, element) {
                    if(event.quart_etat=="Disponible"){
                        event.backgroundColor='#9afff4';
                    }
                    if(event.quart_etat=="Accepté"){
                        event.backgroundColor='#ff9a9a';
                    }
                    if(event.quart_etat=="Réalisé"){
                        event.backgroundColor='#9f9aff';
                    }
                    if(event.quart_etat=="Validé"){
                        event.backgroundColor='#f99aff';
                    }
                    if(event.quart_etat=="Annulé"){
                        event.backgroundColor='#eeeeee';
                    }
                    var nom_pro;
                    if(event.name==null){
                        nom_pro="";
                    }else{
                        nom_pro=event.name;
                    }
                    var nom_res;
                    
                    if(event.description==null){
                        nom_res="";
                    }else{
                        nom_res=event.description;
                    }
                    if(event.description==undefined){
                        nom_res="";
                    }else{
                        nom_res=event.description;
                    }
                    var etoile;
                    if(event.facteur=="2"){
                        etoile='<i class="flaticon-star"></i><i class="flaticon-star"></i>';
                    }
                    else if(event.facteur=="1.5"){
                        etoile='<i class="flaticon-star"></i>';
                    }else{
                        etoile='';
                    }

                    //console.log(nom_pro); 
                    element.css('border-color','#735093');
                    element.css('marging',2);
                    element.css('background-color',event.backgroundColor);
                    if (element.hasClass('fc-day-grid-event')) {
                        element.find('.fc-title').append('<small></br><b>'+event.heure_debut+' - '+event.heure_fin+' '+etoile+'</b> </br>' + nom_res +'</br>' +nom_pro+ '</small>');
                        //element.data('title',event.heure_debut+" "+event.description).append('<div class="fc-description"> Heure : ' + event.description+'</div>');
                        element.data('placement', 'top');
                        //KTApp.initPopover(element);
                    }
                }
            });
        }
    };
}();

jQuery(document).ready(function() {
    KTCalendarBackgroundEvents.init();
});