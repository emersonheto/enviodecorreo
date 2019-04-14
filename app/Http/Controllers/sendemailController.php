<?php

namespace App\Http\Controllers;
use Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Mail\EnvioCorreoMail;
use App\Jobs\NewprofileCreated;

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
}
