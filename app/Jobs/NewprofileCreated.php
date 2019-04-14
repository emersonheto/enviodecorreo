<?php

namespace App\Jobs;

use App\User;
use App\Mail\EnvioCorreoMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
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
        $files=DB::table('files')
        ->join('users', 'users.id', '=', 'files.client_id')
        ->select(DB::raw("users.*,files.*,DATEDIFF(date_expire,NOW()) AS diferencia"))
        ;
            dd($files); return;
        $destino=["microsoft.mail.us@gmail.com","emersonheto@gmail.com"];
        // dd($destino); return;
        Mail::to($destino)->queue(new EnvioCorreoMail());



        // //consulta 1 
        // $clients = DB::table('users')
        //     ->join('flags', 'flags.id', '=', 'users.flag')
        //     ->join('groups', 'groups.id', '=', 'users.group')
        //     ->leftjoin('notifications','users.id','=','notifications.client_id' )
		// 	->select('users.*', 'flags.name as flagname', 'groups.name as groupname','notifications.namefile as notification')
		// 	->where('users.role', 'cliente')
        //     ->get();

        // //consulta 2 
        // $notificacions=Notification::where('client_id','=',$id)
		// ->select(DB::raw("*,DATEDIFF(expiration_date,NOW()) AS diferencia"))
		// ->get();






    }
}
