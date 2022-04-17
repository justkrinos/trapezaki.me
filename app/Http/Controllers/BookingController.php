<?php

namespace App\Http\Controllers;

use App\Models\User3;
use App\Models\User2;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Reservation;

class BookingController extends Controller
{
    public function showBook(User2 $user2)
    {
        $user = Auth::guard('user3')->user();

        //an ise logged in mpenni kanonika
        if ($user)
            return view('www.book', [
                'user2' => $user2
            ]);
        //an ise guest mpenni kanonika (checkari p to session)
        else if (
            request()->session()->has('full_name')
            && request()->session()->has('phone')
            && request()->session()->has('email')
        )
            return view('www.book', [
                'user2' => $user2
            ]);

        // TODO: en fkallei to popup
        //an den ise tpt kamnise redirect piso j fkalli su to login popup
        else
            return redirect('/user/' . $user2->username . '#login');
    }

    public function createBook()
    {
        //get data from the request if not logged in
        if (!Auth::check('user3')) {
            $fullname = session()->get('full_name');
            $phone = session()->get('phone');
            $email = session()->get('email');

            // session()->forget(['full_name', 'phone', 'email']);


            $request = request()->merge([
                'guest' => 1,
                'username'  => "guest-" . mt_rand(1000000000, 9999999999) . strval(User3::max('id') + 1),
                'password'  => bcrypt(uniqid() . strval(mt_rand(1000000, 9999999)) . uniqid()),
                'full_name' => $fullname,
                'phone'     => $phone,
                'email'     => $email,

                //TODO enna prp na kataxorite j to guest account sto table (see code pukatw p en commented)
            ]);

        } else {
            $user = Auth::guard('user3')->user();
            $request = request()-> merge([
                'user3_id' => $user->id,
                'attended' => 0
            ]);

            $validatedData = $request->validate([
                'date'=> 'required|date',
                'time'=> 'required',
                'table_id'=> 'required|numeric',
                'details'=> 'string|max:200',
                'user3_id' => "required",
                'pax'=> 'required|numeric',
                'attended' => 'required'
            ]);

            // return $validatedData;
            
            

            $reservation = Reservation::create($validatedData);

            return 'success';
        }
    }
        //TODO na to kamume na dulefki
        //try{
        // $attributes = $request->validate(
        //     [
        //         'full_name' => 'required|max:50|min:3',
        //         'phone' => 'required|digits_between:8,13|numeric',
        //         'email' => 'required|email|max:100|unique:user3s,email',
        //         'guest' => 'required',
        //         'username' => 'required',
        //         'password' => 'required'
        //     ],
        //     [
        //         'email.unique' => 'The mail already exists, so you already have an account.'
        //     ]
        // );

        // } catch (\Illuminate\Validation\ValidationException $e ) {
        //     return \response($e->errors(),400);
        // }

        //TODO: make the account otan ena dulefki tuto (gia ton guest)
        //User3::create($attributes);

        //TODO na dulepsi j na ginete i kratisi


    public function showMenu(User2 $user2)
    {
        $file = File::get(public_path('assets/menus/') . $user2->menu);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }
}
