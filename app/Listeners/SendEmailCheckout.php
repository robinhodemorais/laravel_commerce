<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckout
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
     * @param  CheckoutEvent  $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        $user = $event->getUser();
        $order = $event->getOrder();

        Mail::send('store.email', compact('user', 'order'), function($message) use ($order, $user)
        {
            $message->from('contato@commerce.com', 'Code Commerce');
            //$message->to('robinhodemorais@gmail.com', 'Robinho');
            $message->to($user->email, $user->name);
            $message->subject('Code Commerce | Recebemos seu Pedido');
        });

        /*
         *  Mail::send('emails.reminder_purchase', compact('user', 'order'), function($message) use ($order, $user) {
            $message->from('contato@codecommerce.com', 'Code Commerce');
            $message->to($user->email, $user->name);
            $message->subject('Code Commerce | Recebemos seu Pedido');
        });

         */
       // echo $user->name;
    }
}
