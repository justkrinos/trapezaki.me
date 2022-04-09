<?php

use App\Http\Controllers\issueControler;
use App\Http\Controllers\issuesBusinessControler;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterUser3;
use App\Http\Controllers\RegisterUser2;
use App\Http\Controllers\User1Controller;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SessionsController2;
use App\Http\Controllers\PhotosController;
use Cviebrock\EloquentTaggable\Models\Tag;
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

    Route::get('/make-a-reservation', function () {
        return view('www.search');
    })->name('first_page');

    Route::get('/user/{user}', function ($slug) {
        //TODO:
        //tuta prp nan /user/seven-seas gt meta isos exume thema me ta login j tuta
        //epd bori na eshi logariasmo me onom "login"
        //extos an kamume blacklist
        //j gia to pukatw   route to idio
        return view('www.selected-profile');
    });

    Route::get('/user/{user}/book',[SessionsController::class, 'showBook']);

    Route::post('/user/{user}/book',[SessionsController::class, 'createBook']);



    // ^ Tuta  panw en eksw pu to middleware
    //   epd boris na to dis ite ise logged in ite oi


    Route::middleware(['guest:user3'])->group(function () {
        Route::get('/', function () {
            return view('www.index');
        });

        Route::get('verify/{email}/{secret}/{?uer_type}','Auth\VerificationController@verifyEmail');

        Route::get('/login', [SessionsController::class, 'create']);

        Route::post('/login', [SessionsController::class, 'login']);

        Route::post('/login_popup', [SessionsController::class, 'login_popup']);
        Route::post('/guest_popup', [SessionsController::class, 'guest_popup']);

        //when you get, return the view
        Route::get('/signup', [RegisterUser3::class, 'view']);
        //you can access this page
        //only if you are not signed in
        //Http/Kernel.php has a link to a handler for guest


        //Handler when signup button is pressed
        //it uses the RegisterUser3 class and its function "create"
        //the class is in app/http/controllers
        Route::post('/signup', [RegisterUser3::class, 'create']);

        //Should be able to handle guest
        //Route::post('/selected-profile', [RegisterUser3::class, 'createGuest']);
    });



    Route::middleware(['auth:user3'])->group(function () {
        //New controller pu elegxei ta sessions gia log in log out
        Route::get('/logout', [SessionsController::class, 'destroy']);

        Route::get('/profile', function () {
            if (!Auth::check('user3'))
                return redirect('/');
            return view('www.profile');
        });

        Route::post('/profile', [SessionsController::class, 'edit']);

        Route::get('/my-reservations', function () {
            return view('www.reservations');
        });

    });
});

//Busiess domain right here
Route::domain('business.' . env('APP_URL'))->group(function () {


    Route::middleware(['guest:user1'])->group(function () {
        Route::get('/login', [SessionsController2::class, 'create']);
        Route::post('/login', [SessionsController2::class, 'login']);

        //TODO: Na sasun ta "/" gia oullous tous users
        //      An en logged in na kami redirect sto main page
        //      an den en logged in na kami redirect sto login page
        //      gia ton logged in user dulefki gia kapio logo
        //      kapws to ixa kami alla en thimume pws
        Route::get('/', [SessionsController2::class, 'create']);
        Route::post('/', [SessionsController2::class, 'login']);

        Route::get('/signup', [RegisterUser2::class, 'view']);
        Route::post('/signup', [RegisterUser2::class, 'create']);

        Route::get('/api/tags', function(){
            $tag = Tag::all()->pluck('name')->toArray();
            return response($tag);
        });
    });



    Route::middleware(['auth:user2'])->group(function () {

        Route::get('/add-reservation', function () {
            return view('business.add-resv');
        });

        Route::get('/logout', [SessionsController2::class, 'destroy']);

        Route::post('/profile', [SessionsController2::class, 'edit']);

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
        Route::get('/list-problems', function () {
            return view('business.list-problems');
        });

        Route::get('/report-problem', function () {
            return view('business.report-problem');
        });

        Route::post('/report-problem',[issuesBusinessControler::class,'store']);

        Route::get('/list-problems', [issuesBusinessControler::class, 'show']);

        Route::post('/api/photo-paths', [PhotosController::class, 'show']);

        Route::post('/api/photo-modify', [PhotosController::class, 'modify']);

    });
});


Route::domain('admin.' . env('APP_URL'))->group(function () {

    Route::middleware(['guest:user1'])->group(function () {
        Route::get('/login', [User1Controller::class, 'create']);
        Route::get('/', [User1Controller::class, 'create']);

        Route::post('/login', [User1Controller::class, 'login']);
    });




    Route::middleware(['auth:user1'])->group(function () {

        Route::get('/manage-customers', function () {
            return view('admin.manage-customers');
        });
        Route::get('/issues', function () {
            return view('admin.issues');
        });

        Route::post('/issues', [issueControler::class, 'flagIssue']);


        Route::get('/pending-requests', function () {
            return view('admin.pending-requests');
        });

        Route::get('/user/{user}', function ($slug) {

            return view('admin.manage-customer');
        });

        Route::get('/edit-floorplan', function () {
            return view('admin.floorplan-editor');
        });

        Route::get('/logout', [User1Controller::class, 'logout']);

        Route::post('/api/photo-paths', [PhotosController::class, 'show']);

        Route::post('/api/photo-modify', [PhotosController::class, 'modify']);

    });
});


//An paei xwris domain (dld trapezaki.me j xoris www),
//na ton kamnei redirect sto first page
//to first page en dilomeno san name('first_page')
//pio panw sto make-a-reservation route fenete
Route::get('/', function(){
    return redirect()->route('first_page');
});

// //redirect customer on page that does not exist
// Route::get('/{not_exist}', function($slug){
//     $path = __DIR__ . "../views/www/{$slug}";

//     if(! file_exists($path))
//     {
//         return redirect('/');
//     }
// });


//Gia otidipote allo na kamume
//abort(404);

