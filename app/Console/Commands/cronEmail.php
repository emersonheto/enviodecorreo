<?php

// require __DIR__.'/vendor/autoload.php';
namespace App\Console\Commands;
use App\Mail\EnvioCorreoMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Console\Commands\cronEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Application;

class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'quiz:start';

    protected $signature = 'command:cronEmail';

    /**
     * The console command description.
     *
     * @var string
     */
    // protected $description = 'Command description';
    protected $description = 'Envio de correos a los clientes diariamente';


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

        //Aqui se enviara los correos diariamente a todos los usuarios      >>/dev/null 2>&1
        // $users=User::all(); //cambiar por la lista de correos 
        
        // $files=DB::table('files')->join('users', 'users.id', '=', 'files.client_id')
        // ->select(DB::raw("*,DATEDIFF(files.date_expire,NOW()) AS diferencia"))->get();//->pluck('file');

        $destino=["microsoft.mail.us@gmail.com","emersonheto@gmail.com"];
        foreach ($destino as $des ) {
           echo "el correo es : ".$des."/ln";
           Mail::to($des)->queue(new EnvioCorreoMail());
           Log::info("Se envio al correo de notificacion a : $des ");           
        }
    }
}
