<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Quartdetravail;
use App\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ExpirationQuart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quart:expiration';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '6h apres la date et heure de début du quart il devient automatiquement expiré';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $today = date("Y-m-d");
        $quarts = Quartdetravail::where('quart_etat','Disponible')->where('jour_debut',$today)->get();

        $time = date("H:i");
        if($quarts==null){
            $this->info('Pas de quarts expirés !!');
        }else{
            //select if there are new quart de travail
            foreach ($quarts as $a){
                $timestamp = strtotime($a->heure_debut) + 60*60*6;
                $now = date('H:i');
                $fin = strtotime($now);
                $diff = abs($timestamp - $fin) / 3600;
                //$temp = strtotime($time_exp) - strtotime($now) ;
                if(intval($diff)>=6){
                    DB::table('quartdetravails')->where('id',$a->id)->update(array(
                        'quart_etat' =>'Expiré',
                        'updated_at' =>NOW()));
                }

            }
            $this->info('Les quarts sont expirés !!');
        }
        
    }
    
}
