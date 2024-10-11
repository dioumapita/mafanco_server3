<?php

namespace App\Mail;

use App\Models\DossierAffaireCivil;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DemoMailMarkdown extends Mailable
{
    use Queueable, SerializesModels;

    public $demandeur;
    public $defendeur;
    public $objet;
    public $num;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($demandeur, $defendeur, $objet,$num)
    {
        //
        $this->demandeur = $demandeur;
        $this->defendeur = $defendeur;
        $this->objet = $objet;
        $this->num = $num;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $document = DossierAffaireCivil::where('num_rg',$this->num)->first()->documentaffaireCivils()->first();

        return $this->subject('Nouveau dossier')
                    ->markdown('emails.testmarkdown')
                    ->attach('uploads/'.$document->chemin_doc);
    }
}
