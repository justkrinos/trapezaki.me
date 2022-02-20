<?php

use Illuminate\Support\Facades\Route;

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
        return view('www.index');
    });


    Route::get('/login', function () {
        return view('www.login');
    });

    Route::get('/guest', function () {
        return view('www.guest');
    });


    Route::get('/signup', function () {
        return view('www.signup');
    });

    Route::get('/profile', function () {
        return view('www.profile');
    });
    //
    Route::get('/make-a-reservation', function () {
        return view('www.search');
    });


    Route::get('/my-reservations', function () {
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


    Route::get('/signup', function () {
        return view('business.signup');
    });

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

    Route::get('/', function () {
        return view('admin.login');
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

    Route::get('/manage-customers', function () {
        return view('admin.manage-customers');
    });

    Route::get('/edit-floorplan', function () {
        return view('admin.floorplan-editor');
    });



});
