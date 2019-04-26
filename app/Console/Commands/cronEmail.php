<?php

// require __DIR__.'/vendor/autoload.php';
namespace App\Console\Commands;
use App\User;
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

        //Aqui se enviara los correos diariamente a todos los usuarios          
        //  $users=User::all(); //cambiar por la lista de correos 
        // y datos necesarios que iran en el correo
                
        // $files=DB::table('files')->join('users', 'users.id', '=', 'files.client_id')
        // ->select(DB::raw("*,DATEDIFF(files.date_expire,NOW()) AS diferencia"))->get();//->pluck('file');
        $users= new User([
            'name'=>'Emerson Herrera desde ObjUser',
            'email'=>'emersonheto@gmail.com',
        ]);

        $user1= User::Find(1);
        

        // $destino=["microsoft.mail.us@gmail.com","emersonheto@gmail.com"];
        // foreach ($destino as $des ) {
            $datos[]=[1,23,4,5,67,2];               
            $dat[]=["uno","dos","tres","cuantro","cinco"];      
           echo "el correo es : ".$users->email."/ln ";

           Mail::to($users->email,$users->name)  
                ->send(new EnvioCorreoMail($users));
         
           Log::info("Se envio al correo de notificacion a : $users->email ");           
        // }
    }
}
