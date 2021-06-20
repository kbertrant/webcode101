<div class="message-wrapper" style="width:500px; height:300px; overflow: auto;">
    <ul class="messages">
        @foreach ($messages as $message)
        <!-- Reciever Message-->
      <div class="media w-50 mb-3 {{($message->sender_id == Auth::id()) ? 'ml-auto': 'ml-3'}}">
          <div class="media-body">
            <div class="bg-primary rounded py-2 px-3 mb-2">
              <p class="text-small mb-0 text-white">{{$message->msg_content}}</p>
            </div>
            <p class="small text-muted">{{date('d M y, H:i',strtotime($message->updated_at))}}</p>
          </div>
        </div>
      @endforeach
    </ul>
</div>