<?php

namespace App\Http\Controllers;
use Mail;
use App\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Mail\EnvioCorreoMail;
use App\Jobs\NewprofileCreated;
use Illuminate\Support\Facades\Log;

class sendemailController extends Controller
{
    public function enviarcorreo()
    {
    /*
    Retrasé el trabajo por 60 segundos (1 minuto) y las cosas funcionan muy bien.
    */
        $user[1]="emersonheto@gmail.com";
        dispatch((new NewprofileCreated($user[1]))->delay(60));

        return "correo enviado";

    }
 
    // public function envioConjob()
    // {
    //     $job=new NewprofileCreated();
    //     dispatch($job);
    //     return "correo con job enviado";
    // }

    public function envioConjob(){

      

        $users= new User([
            'name'=>'Emerson Herrera desde ObjUser',
            'email'=>'emersonheto@gmail.com',
        ]);

        // $destino=["microsoft.mail.us@gmail.com","emersonheto@gmail.com"];
        // foreach ($destino as $des ) {
            $datos[]=[1,23,4,5,67,2];               
            $dat[]=["uno","dos","tres","cuantro","cinco"];      
           echo "el correo es : ".$users->email."/ln ";

           Mail::to($users->email,$users->name)  
                ->queue(new EnvioCorreoMail($users));
         
           Log::info("Se envio al correo de notificacion a : $users->email ");           
        // }
        return "correo en cola";
    
    }
}   
