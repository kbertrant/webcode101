<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use App\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();
        if($auth->role=="residence"){
            return redirect()->back()->with('success', "Attention !! Vous n'avez pas les autorisations necessaires !!");
        }elseif($auth->status=="desactivé"){
            return redirect()->back()->with('success', "Votre compte n'est pas activé !! Vous ne pouvez pas acceder aux ressources !!");
        }
        // select all users except logged in user
        // $users = User::where('id', '!=', Auth::id())->get();

        // count how many message are unread from the selected user
        $users = DB::select("select users.id, users.name, users.photo, users.email, users.phone, users.updated_at, count(read_at) as unread
        from users LEFT  JOIN  messages ON users.id = messages.sender_id and messages.receiver_id = " . Auth::id() . "
        where users.id != " . Auth::id() . "
        group by users.id, users.name, users.photo, users.email");

        return view('message.list_message', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd($request);
        
        return view('message.create_message');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->sender_id);
        $messages = new Message();
        $messages->sender_id = $request->sender_id;
        $messages->conv_id = $request->conv_id;
        $messages->msg_content = $request->msg_content;
        $messages->msg_date = $request->msg_date;
        $messages->msg_etat = $request->msg_etat;

        $messages->save();

       

       // $messages = Message::all();
        return view('message.list_message',['messages'=>$messages]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getMessage($user_id)
    {
        $my_id = Auth::id();

        // Make read all unread message
        Message::where(['sender_id' => $user_id, 'receiver_id' => $my_id])->update(['read_at' => 1]);

        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('sender_id', $user_id)->where('receiver_id', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('sender_id', $my_id)->where('receiver_id', $user_id);
        })->get();

        return view('message.create_message', ['messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
    
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->sender_id = $from;
        $data->receiver_id = $to;
        $data->msg_content = $message;
        // message will be unread when sending message
        $data->save();

        // pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['sender_id' => $from, 'receiver_id' => $to]; // sending from and to user id when pressed enter
        
        $pusher->trigger('my-channel', 'my-event', $data);
        dd($data);
    }
}
