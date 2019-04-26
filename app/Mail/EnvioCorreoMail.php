<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvioCorreoMail extends Mailable
{
    use Queueable;

    /**
     * Create a new message instance.
     *
     * @var User
     */
   public $users;

    public function __construct(User $users)
    {
      $this->users=$users;
      // $this->users=User::all();
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //esta vista se enviara al correo 

        return $this->view('emails.sendcorreo') 
                    // ->text('mails.demo_plain')//si es un texto plano 
                    ->from('mcontrolpruebas@gmail.com','Emerson')//Aqui se pone quien envia el mensaje correo y nombre "emersonheto@gmail.com, Emerson"
                    ->subject('Prueba de envio ')
                    ->with(
                      // 'nombre',$this->users,
                      [
                       'testVarTwo' => '2',
                       
                      ])  //Se adjuntan variables que se podran usar en la pantilla
                    //   ->attach(public_path('/images').'/demo.jpg', [
                    //           'as' => 'demo.jpg',
                    //           'mime' => 'image/jpeg',
                    //   ])      Si se desea adjuntar archivos
                      ;
    }
}
