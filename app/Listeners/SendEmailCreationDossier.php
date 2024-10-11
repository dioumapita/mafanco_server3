<?php

namespace App\Listeners;

use App\Events\CreationDosser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\DemoMailMarkdown;

class SendEmailCreationDossier
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreationDosser  $event
     * @return void
     */
    public function handle()
    {
        //

        $email =    Mail::to('elhadjdiouma@gmail.com')
                        ->queue(new DemoMailMarkdown('Barry','ousmane','voleur','22'));
    }
}
