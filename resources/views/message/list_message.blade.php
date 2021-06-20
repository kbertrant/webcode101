@extends('main')

@section('title', ' Messagerie')


@section('main-content')

<!-- end:: Header -->
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
        <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                <!-- begin:: Subheader -->
                <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                    <div class="kt-subheader__main">
                        <h3 class="kt-subheader__title">Messagerie</h3>
                        <h4 class="kt-subheader__desc">Envoyer vos messages</h4>
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
                        
                        <div class="container py-5 px-2">
                          
                            <div class="row rounded-lg overflow-hidden shadow">
                              <!-- Users box-->
                              <div class="col-lg-5 col-md-12">
                                <h3 class="kt-subheader__desc" style="text-align: center">Liste des travailleurs</h3>
                                
                                <div class="bg-white">
                            
                                  <div class="messages-box" style="width:390px; height:400px; overflow: auto;">
                                    <div class="list-group rounded-0">
                                       @foreach ($users as $item)
                                       <span id="{{$item->id}}" class="user list-group-item list-group-item-action list-group-item-light rounded-0">
                                        
                                        <div class="media">
                                          @if($item->unread)
                                            <span class="pending">{{ $item->unread }}</span>
                                          @endif
                                          <img src="/storage/app/public/avatars/{{ $item->photo }}" alt="user" width="50" class="rounded-circle">
                                          <div class="media-body ml-4">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                              <h6 class="mb-0">{{$item->name}}</h6><small class="small font-weight-bold">{{date('d M y, H:i',strtotime($item->updated_at))}}</small>
                                            </div>
                                            <p class="font-italic mb-0 text-small"> Téléphone : {{$item->phone}}</p>
                                          </div>
                                        </div>
                                      </span>
                                      @endforeach
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- Chat Box-->
                              <div class="col-lg-7 col-md-12">
                                <h3 class="kt-subheader__desc" style="text-align: center">Conversation</h3>
                                <div class="col-lg-7 col-md-12 chat-box bg-white" id="messages">
                                   
                                </div>
                          
                                <!-- Typing area -->
                                <form action="#" class="bg-light">
                                  <div class="input-group">
                                    <input type="text" placeholder="Ecrire votre message" name="message" id="message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                                    <div class="input-group-append">
                                      <button id="sendsms" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
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
    </div>

@endsection
{{-- <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> --}}
<script
      src="https://code.jquery.com/jquery-3.2.1.js"
      integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
      crossorigin="anonymous">
   </script>
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script type="text/javascript">
  var receiver_id = '';
  var my_id = "{{Auth::id()}}";

  $(document).ready(function(){
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     }
  });
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('bd41957e48367bfd83af', {
    cluster: 'ap2',
    forceTLS: true
  });

  var channel = pusher.subscribe('my-channel');
  channel.bind('my-event', function(data) {
    if (my_id == data.sender_id) {
                $('#' + data.receiver_id).click();
            } else if (my_id == data.receiver_id) {
                if (receiver_id == data.from) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.sender_id).click();
                } else {
                    // if receiver is not seleted, add notification for that user
                    var pending = parseInt($('#' + data.sender_id).find('.pending').html());
                    if (pending) {
                        $('#' + data.sender_id).find('.pending').html(pending + 1);
                    } else {
                        $('#' + data.sender_id).append('<span class="pending">1</span>');
                    }
                }
            }
  });

  $('#sendsms').click(function(){
    var message = $('#message').val();
    // check if enter key is pressed and message is not null also receiver is selected

    if ( message != '' && receiver_id != '') {
      $('#message').val(''); // while pressed enter text box will be empty
        var datastr = "?receiver_id=" + receiver_id + "&message=" + message;
          $.ajax({
            type: "post",
            url: "/message", // need to create this post route
            data: {message:message,
                  receiver_id: receiver_id},
            cache: false,
            success: function (data) {
              $(this).addClass('active');
              $(this).find('.pending').remove();
              $.ajax({
                type: "get",
                url: "/message/" + receiver_id,
                data: "",
                cache: false,
                success: function(data){
                  
                  $('#messages').html(data);
                  scrollToBottomFunc();
                },
                error: function (a, b, c) {
                    
                    console.log(a, b, c);
                }
              });
            },
            error: function (jqXHR, status, err) {
            },
            complete: function () {
              scrollToBottomFunc();
            }
          });
    }  
  });


    $('.user').click(function(){
      $('.user').removeClass('active');
      $(this).addClass('active');
      $(this).find('.pending').remove();
      receiver_id = $(this).attr('id');
      //alert(receiver_id);
      $.ajax({
        type: "get",
        url: "/message/" + receiver_id,
        data: "",
        cache: false,
        success: function(data){
          
          $('#messages').html(data);
          scrollToBottomFunc();
        },
        error: function (a, b, c) {
            //alert("Error");
            console.log(a, b, c);
        }
      });
    });
  });

  // make a function to scroll down auto
  function scrollToBottomFunc() {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 10);
    }
</script>