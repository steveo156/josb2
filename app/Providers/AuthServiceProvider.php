<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */

    
    public function boot(): void
    {
        // Este codigo es para personalizar el asunto al momento de enviar la verificacion por email
        VerifyEmail::toMailUsing(function($notifilable, $url){
            return(new MailMessage)
            ->subject('Verificar cuenta')
            ->line('Tu cuenta ya está casi lista, solo debes presionar el enlace a continuación')
            ->action('Confirmar cuenta', $url)
            ->line('Si no creaste esta cuenta, puedes ignorar este mensaje.');
        });
    }
}
