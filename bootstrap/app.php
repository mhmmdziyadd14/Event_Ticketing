<?php

use Illuminate\Foundation\Application;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'admin' => \App\Http\Middleware\AdminAccessMiddleware::class,


        ]);

        // Configure CSRF protection
        $middleware->validateCsrfTokens(
            // Optionally, except specific routes
            except: [
                // 'transactions', // Uncomment and add routes to exclude from CSRF protection
            ]
        );
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->render(function (Throwable $e) {
            if ($e instanceof AccessDeniedHttpException) {
                if ($e->getPrevious() instanceof AuthorizationException) {
                    return redirect()
                        ->route('dashboard')
                        ->withErrors($e->getMessage());
                }
            }
            // Optionally handle other exceptions or return a default response
            return response()->view('errors.index', ['exceptions' => $e->getMessage()], 500);
        });
    })
    ->create();