<?php

/*
    MEGALO TODO

    AN DEN DIAGRAFONTE TA TABLES APO TIN VASI, TO SEARCH TA VRISKEI AN IKANOPOIEI TO PAX<=CAPACITY
    KAI ETSI EMFANIZEI BUSINESSES PU ISWS DEN EXOUN KATALLILO TABLE, EPD I VASI LEEI PWS IPARXEI
*/

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\issueControler;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\IssuesU2Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FloorPlanController;
use App\Http\Controllers\RegisterUser3;
use App\Http\Controllers\RegisterUser2;
use App\Http\Controllers\User1Controller;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SessionsController2;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\ManageBusinessController;
use App\Http\Controllers\PendingRequestsController;
use App\Http\Controllers\MyReservationsController;
use App\Http\Controllers\ManageReservationsController;
use App\Http\Controllers\TimeSlotController;
use App\Http\Controllers\SearchController;
use Cviebrock\EloquentTaggable\Models\Tag;
use Illuminate\Support\Facades\Auth;
use App\Models\User3;
use App\Models\User2;
use App\Models\User1;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use App\Models\Reservation;




/* ------------BINDINGS-------------- */

//Bind a the wildcard {user2} to a username of user2
//if it doesnt exist it will throw an 404 error
//TODO: na to kamume se ulla ta wildcards etsi

Route::bind('user2', function ($value) {
    return User2::where('username', $value)->first();
});

// Route::bind('user3', function ($value) {
//     return User3::where('id', $value)->where('guest',0)->first();
// });

Route::bind('guest', function ($value) {
    return User3::where('id', $value)->where('guest', 1)->first();
});

// Route::bind('reservation', function ($value) {
//     return Reservation::where('id', $value)->first();
// });



/* -------------------------------- */


Route::domain('www.' . env('APP_URL'))->group(function () {

    Route::get('/make-a-reservation', [SearchController::class, 'show'])->name('first_page');

    //TODO: tuto edulefke
    /*Route::get('/make-a-reservation', function () {
        $showCityPop = true;
        $city = "";

        //na dulefki j gia guest j gia user 3 gt en geniko tuto
        if (Auth::check('user3') && Auth::guard('user3')->user()->city) {
            $showCityPop = false;
            $city = Auth::guard('user3')->user()->city;
        } elseif(session()->has('city')){
            $showCityPop = false;
            $city = session()->get('city');
        }
        return view('www.search', [
            'showCityPop' => $showCityPop,
            'city'        => $city
        ]);
    })->name('first_page');*/

    Route::get('/user/{user2}', [SearchController::class,'showProfile']);

    Route::get('/api/{user2}/time-slots', [TimeSlotController::class, 'getTimeSlots']);

    Route::get('/user/{user2}/menu', [MenuController::class, 'showU3']);


    Route::get('/user/{user2}/book', [BookingController::class, 'showBook']);
    Route::post('/user/{user2}/book', [BookingController::class, 'createBook']);
    Route::get('/api/{user2}/floor-plan', [FloorPlanController::class, 'getFloorPlanJson']);

    Route::post('/api/change-city',[SessionsController::class,'changeCity']);

    // ^ Tuta  panw en eksw pu to middleware
    //   epd boris na to dis ite ise logged in ite oi


    Route::middleware(['guest:user3'])->group(function () {

        //TODO na mpei se controller
        Route::get('/', function () {
            return redirect()->route('first_page');
            // $showCityPop = true;
            // $city = "";
            // if (session()->has('city')) {
            //     $showCityPop = false;
            //     $city = session()->get('city');
            // }


            // //TODO evala to etsi gia na dulefkei, sigirisma
            // return view('www.search', [
            //     'showCityPop' => $showCityPop,
            //     'city'        => $city,
            //     'users'       => App\Models\User2::inRandomOrder()
            //                             ->limit(5)
            //                             ->where('is_verified', 1)
            //                             ->where('status', 1)
            //                             ->get()
            // ]);
        });

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

        Route::get('verify/{email}/{secret}/', [EmailController::class, 'verifyUser3']);

        //TODO: na ginun bind ta secret me u2 j u3
        Route::get('/change-password/{email}/{secret}/', [EmailController::class, 'showForgotUser3']);
        Route::post('/change-password/{email}/{secret}/', [EmailController::class, 'modifyForgotUser3']);

        Route::get('/forgot-password', [ForgotPasswordController::class, 'show']);
        Route::post('/forgot-password', [ForgotPasswordController::class, 'sendEmailUser3']);
    });



    Route::middleware(['auth:user3'])->group(function () {
        //New controller pu elegxei ta sessions gia log in log out
        Route::get('/logout', [SessionsController::class, 'destroy']);

        Route::get('/profile', [SessionsController::class,'showProfile']);

        //TODO en dulefki to route dunno why
        //TODO: na stelnei email sto reservation
        Route::post('/profile', [SessionsController::class, 'edit']);

        Route::get('/my-reservations', [MyReservationsController::class, 'show']);
        Route::post('/my-reservations', [MyReservationsController::class, 'modify']);
    });
});

//Busiess domain right here
Route::domain('business.' . env('APP_URL'))->group(function () {

    Route::middleware(['auth:user2'])->group(function () {

        Route::get('/manage-reservations', [ManageReservationsController::class, 'show']);
        Route::post('/api/apply-attendance', [ManageReservationsController::class, 'changeAttendance']);

        Route::get('/add-reservation', [BookingController::class, 'showAddResv']);

        Route::get('/logout', [SessionsController2::class, 'destroy']);
        Route::post('/profile', [SessionsController2::class, 'edit']);

        Route::get('/edit-reservation', [BookingController::class,'showEditResv']);
        Route::post('/edit-reservation',[BookingController::class,'editResv']);


        Route::get('/profile', [SessionsController2::class,'showProfile']);
        Route::get('/list-problems', function () {
            return view('business.list-problems');
        });

        Route::get('/report-problem', [IssuesU2Controller::class,'show']);
        Route::post('/report-problem', [IssuesU2Controller::class, 'post']);

        Route::post('/api/photo-paths', [PhotosController::class, 'show']);
        Route::post('/api/photo-modify', [PhotosController::class, 'modify']);

        Route::post('/manage-reservations', [ManageReservationsController::class, 'modify']);
        Route::get('/api/floor-plan', [FloorPlanController::class, 'getFloorPlanJsonU2']);

        Route::get('/profile/menu', [MenuController::class, 'showU2']);
        Route::post('/profile/menu', [MenuController::class, 'modify']);

        //Book as user2
        Route::post('/add-reservation', [BookingController::class, 'createBookUser2']);

        //Get timeSlots
        Route::get('/api/{user2}/time-slots', [TimeSlotController::class, 'getTimeSlots']);


    });


    Route::middleware(['guest:user2'])->group(function () {
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

        // TODO: na pai sto api route na dulepsun jina
        Route::get('/api/tags', function () {
            $tag = Tag::all()->pluck('name')->toArray();
            return response($tag);
        });

        Route::get('verify/{email}/{secret}/', [EmailController::class, 'verifyUser2']);

        Route::get('/change-password/{email}/{secret}/', [EmailController::class, 'showForgotUser2']);
        Route::post('/change-password/{email}/{secret}/', [EmailController::class, 'modifyForgotUser2']);

        Route::get('/forgot-password', [ForgotPasswordController::class, 'show']);
        Route::post('/forgot-password', [ForgotPasswordController::class, 'sendEmailUser2']);
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


        Route::get('/pending-requests', [PendingRequestsController::class, 'show']);
        Route::post('/pending-requests', [PendingRequestsController::class, 'modify']);

        Route::get('/user/{user2}', [ManageBusinessController::class, 'show']);
        Route::post('/user/{user2}', [ManageBusinessController::class, 'edit']);


        Route::get('/api/tags', function () {
            $tag = Tag::all()->pluck('name')->toArray();
            return response($tag);
        });

        Route::get('/user/{user2}/menu', [ManageBusinessController::class, 'getMenu']);

        Route::get('/api/{user2}/floor-plan', [FloorPlanController::class, 'getFloorPlanJson']);
        Route::get('/user/{user2}/floor-plan', [FloorPlanController::class, 'show']);
        Route::post('/user/{user2}/floor-plan', [FloorPlanController::class, 'modify']);


        //Edit User2
        Route::get('/logout', [User1Controller::class, 'logout']);

        Route::post('/api/photo-paths', [PhotosController::class, 'show']);
        Route::post('/api/photo-modify', [PhotosController::class, 'modify']);
    });
});


//An paei xwris domain (dld trapezaki.me j xoris www),
//na ton kamnei redirect sto first page
//to first page en dilomeno san name('first_page')
//pio panw sto make-a-reservation route fenete
Route::get('/', function () {
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
