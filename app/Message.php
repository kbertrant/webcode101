<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['sender_id', 'receiver_id', 'msg_content', 'msg_date', 'read_at', 'created_at', 'updated_at'];

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function Conversation(){
        return $this->belongsTo('App\Conversation');
    }
}
