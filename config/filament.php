<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Broadcasting
    |--------------------------------------------------------------------------
    | ... (konfigurasi broadcasting) ...
    */

    'broadcasting' => [
        // ...
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    | ... (konfigurasi filesystem disk) ...
    */

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Assets Path
    |--------------------------------------------------------------------------
    | ... (konfigurasi assets path) ...
    */

    'assets_path' => null,

    /*
    |--------------------------------------------------------------------------
    | Cache Path
    |--------------------------------------------------------------------------
    | ... (konfigurasi cache path) ...
    */

    'cache_path' => base_path('bootstrap/cache/filament'),

    /*
    |--------------------------------------------------------------------------
    | Livewire Loading Delay
    |--------------------------------------------------------------------------
    | ... (konfigurasi loading delay) ...
    */

    'livewire_loading_delay' => 'default',

    /*
   |--------------------------------------------------------------------------
   | Filament Middleware
   |--------------------------------------------------------------------------
   |
   | These are the route middleware that will be applied to all Filament
   | routes, including the panel and API routes.
   |
   */

    'middleware' => [
        'auth',
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'admin'
    ],

    /*
    |--------------------------------------------------------------------------
    | Filament Auth
    |--------------------------------------------------------------------------
    |
    | These are the settings for authentication in Filament.
    |
    */
    'auth' => [
        'pages' => [
            'login' => \Filament\Pages\Auth\Login::class,
        ],
        'check' => fn() => auth()->check() && auth()->user()->hasRole('admin'),
        'guard' => 'web',
        'redirect_url' => '/',
        'password_reset' => [
            'request' => \Filament\Pages\Auth\PasswordReset\RequestPasswordReset::class,
            'email' => \Filament\Pages\Auth\PasswordReset\EmailPasswordResetLink::class,
            'reset' => \Filament\Pages\Auth\PasswordReset\ResetPassword::class,
        ],
        'email_verification' => [
            'prompt' => \Filament\Pages\Auth\EmailVerification\EmailVerificationPrompt::class,
            'notice' => \Filament\Pages\Auth\EmailVerification\EmailVerificationNotice::class,
            'verify' => \Filament\Pages\Auth\EmailVerification\VerifyEmail::class,
        ],
    ],
];