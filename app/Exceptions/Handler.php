<?php

namespace App\Exceptions;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }



    // protected function unauthenticated($request, AuthenticationException $exception)
    // {
    //     if ($request->is('user2')) {
    //         return response()->json(['error' => 'Unauthenticated.'], 401);
    //     }
    //     if ($request->is('user2')) {
    //         return redirect()->guest('/');
    //     }
    //     if ($request->is('user3')) {
    //         return redirect()->guest('/login');
    //     }
    //     return redirect()->guest(route('login'));
    // }
}
