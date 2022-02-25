<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUser3;
use App\Http\Controllers\RegisterUser2;
use App\Http\Controllers\User1Controller;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Auth;
use App\Models\User2;
use App\Models\User1;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain('www.' . env('APP_URL'))->group(function () {

    Route::get('/', function () {
        if (Auth::check('user3'))
            return redirect('/make-a-reservation');
        return view('www.index');
    });


    //Use the sessions controller class to handle the login
    Route::get('/login', [SessionsController::class, 'create']);

    Route::post('/login', [SessionsController::class, 'login']);

    Route::get('/guest', function () {
        return view('www.guest');
    });

    //when you get, return the view
    Route::get('/signup', [RegisterUser3::class, 'view'])->middleware('guest');
    //you can access this page
    //only if you are not signed in
    //Http/Kernel.php has a link to a handler for guest


    //Handler when signup button is pressed
    //it uses the RegisterUser3 class and its function "create"
    //the class is in app/http/controllers
    Route::post('/signup', [RegisterUser3::class, 'create']);

    //New controller pu elegxei ta sessions gia log in log out
    Route::get('/logout', [SessionsController::class, 'destroy']);

    Route::get('/profile', function () {
        if (!Auth::check('user3'))
            return redirect('/');
        return view('www.profile');
    });

    Route::get('/make-a-reservation', function () {
        return view('www.search');
    });


    Route::get('/my-reservations', function () {
        if (!Auth::check('user3'))
            return redirect('/');
        return view('www.reservations');
    });

    Route::get('/seven-seas', function () {
        return view('www.selected-profile');
    });
});


Route::domain('business.' . env('APP_URL'))->group(function () {

    Route::get('/', function () {
        return view('business.login');
    });


    Route::get('/add-reservation', function () {
        return view('business.add-resv');
    });

    Route::get('/signup', [RegisterUser2::class, 'create']);

    Route::post('/signup', [RegisterUser2::class, 'store']);

    Route::get('/edit-reservation', function () {
        return view('business.edit-resv');
    });

    Route::get('/manage-reservations', function () {
        return view('business.manage-resv');
    });

    Route::get('/dashboard', function () {
        return view('business.dashboard');
    });

    Route::get('/profile', function () {
        return view('business.profile');
    });

    Route::get('/report-problem', function () {
        return view('business.report-problem');
    });
});

Route::domain('admin.' . env('APP_URL'))->group(function () {

    Route::middleware(['guest:user1'])->group(function () {
        Route::get('/login', [User1Controller::class, 'create']);
        Route::post('/login', [User1Controller::class, 'login']);
    });

    Route::middleware(['auth:user1'])->group(function () {
        Route::get('/manage-customers', function () {
            return view('admin.manage-customers');
        });
        Route::get('/issues', function () {
            return view('admin.issues');
        });

        Route::get('/pending-requests', function () {
            return view('admin.pending-requests');
        });

        Route::get('/seven-seas', function () {
            return view('admin.manage-customer');
        });

        Route::get('/edit-floorplan', function () {
            return view('admin.floorplan-editor');
        });

        Route::get('/logout',[User1Controller::class, 'logout']);
    });
});


//return abort(404);
