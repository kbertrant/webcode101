<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poste;
use App\Professionnel;
use Twilio\Rest\Client;
use Validator;

class BulkSmsController extends Controller
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


    public function sendSms( Request $request )
    {
       // Your Account SID and Auth Token from twilio.com/console
       $sid    = env( 'TWILIO_SID' );
       $token  = env( 'TWILIO_TOKEN' );
       $client = new Client( $sid, $token );
       $validator = Validator::make($request->all(), [
           'poste' => 'required',
           'message' => 'required'
       ]);
       if ( $validator->passes() ) {

        $s = 0;
        foreach( $request->poste as $number )
        {
            $i = 0;
            $profs = Professionnel::join('users', 'users.id', '=', 'professionnels.user_id')
                        ->where('post_id', '=',$request->poste[$i])
                        ->select('phone')
                        ->get();
            $message = $request->message;

           foreach( $profs as $number )
           {
               
               //dd($number->phone);
               $i = $s++;
               $client->messages->create(
                   $number->phone,
                   [
                       'from' => env( 'TWILIO_FROM' ),
                       'body' => $message,
                   ]
               );
           }

           return back()->with( 'success', $i . " messages envoyes!" );
        }    
       } else {
           return back()->withErrors( $validator );
       }
   }
}
