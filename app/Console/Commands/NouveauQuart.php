<?php

namespace App\Console\Commands;

use App\Quartdetravail;
use App\User;
use App\Notifications\QuartCreation;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;

class NouveauQuart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quart:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoi des mails pour les nouveaux quarts crées en 1h';

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
        $quart = Quartdetravail::where('notif',0)->get();

        if($quart==null){   
            $this->info('Pas de quarts crées dans cette intervalle !!');
        }else{
            //select if there are new quart de travail
            foreach ($quart as $a){
                DB::table('quartdetravails')->where('id',$a->id)->update(array(
                    'notif' =>1,
                    'updated_at' =>NOW()));
            }
            //select workers and send them notification
            $users = User::where('role','professionnel')->get();
            foreach ($users as $u){
                $u->notify(new QuartCreation());
            }

        }
        $this->info('Notification nouveaux quarts envoyés avec succès !!');
    }
}
