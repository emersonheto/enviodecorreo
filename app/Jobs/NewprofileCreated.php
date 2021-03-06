<?php

namespace App\Jobs;

use App\User;
use App\Mail\EnvioCorreoMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
 
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NewprofileCreated implements ShouldQueue //este es el job
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    // protected $user;

    public function __construct( )
    {
        // $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        //SE PASARA TODO ESTO AL CONSOLE  cronEmail.php

        //Aqui se enviara los correos diariamente a todos los usuarios
        $users=User::all(); //cambiar por la lista de correos 
        
        // $files=DB::table('files')->join('users', 'users.id', '=', 'files.client_id')
        // ->select(DB::raw("*,DATEDIFF(files.date_expire,NOW()) AS diferencia"))->get();//->pluck('file');

        //  con esto tengo todos los datos cargados listo para ser llamado en la vista o los correos 
                        
        $destino=["microsoft.mail.us@gmail.com","emersonheto@gmail.com"];
        foreach ($destino as $des ) {
           echo "el correo es : ".$des."<br>";
           Mail::to($des)->queue(new EnvioCorreoMail());
           Log::info("Se envio al correo de notificacion a :  $des ");
        }
         
        


    }
}
