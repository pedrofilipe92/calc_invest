<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Carteira;

class CreateCarteiraNewUser
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
     * @param  object  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        Carteira::create([
            'user_id'               => $event->user->id,
            'qtd_investimentos'     => 0,
            'total_aplicado'        => 0,
            'saldo'                 => 0
        ]);
    }
}
