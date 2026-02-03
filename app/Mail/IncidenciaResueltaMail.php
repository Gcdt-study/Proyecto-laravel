<?php

namespace App\Mail;

use App\Models\Incidencia;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IncidenciaResueltaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $incidencia;

    public function __construct(Incidencia $incidencia)
    {
        $this->incidencia = $incidencia;
    }

    public function build()
    {
        return $this->subject('Tu incidencia ha sido resuelta')
                    ->view('emails.incidencia_resuelta');
    }
}
