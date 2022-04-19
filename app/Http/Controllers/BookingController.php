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


            //TODO: na gini uncomment tuto
            // session()->forget(['full_name', 'phone', 'email']);


            $request = request()-> merge([
                'guest' => 1,
                'username'  => "guest-" . mt_rand(1000000000, 9999999999) . strval(User3::max('id') + 1),
                'password'  => bcrypt(uniqid() . strval(mt_rand(1000000, 9999999)) . uniqid()),
                'full_name' => $fullname,
                'phone'     => $phone,
                'email'     => $email,
            ]);

            $attributes = $request->validate([
                'full_name' => 'required|max:50|min:3',
                'phone' => 'required|digits_between:8,13|numeric',
                'email' => 'required|email|max:100',
                'guest' => 'required',
                'username' => 'required',
                'password' => 'required'
            ]);

            $guest = User3::where('email',$attributes['email'])->where('guest',1)->first();

            //Check an iparxi idi guest me tuto to email j kame update ta data tou if yes
            if($guest){
                $guest->update($attributes);
            }else{
                $guest = User3::create($attributes);
            }
            

            //TODO: opu eshi validation numeric na to kamume nan min:0 j na valume max an xriazete (px. pax <=16)
            $validatedData = $request->validate([
                'date'=> 'required|date',
                'time'=> 'required',
                'table_id'=> 'required|numeric',
                'details'=> 'string|max:200',
                'pax'=> 'required|numeric'
            ]);

            $reservation = $guest->reservations()->create($validatedData);
            // $reservation['guest'] = 1;

            return $reservation;

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
            
            unset($validatedData['user3_username']);

            $reservation = Reservation::create($validatedData);
            
            return $reservation;
        }
    }

    public function createBookUser2()
    {
        $user2 = Auth::guard('user2')->user();
        if(request()->has("guest"))
        {
            $request = request()->merge([
                'guest' => 1,
                'username' => "guest-" . mt_rand(1000000000, 9999999999) . strval(User3::max('id') + 1),
                'password' => bcrypt(uniqid() . strval(mt_rand(1000000, 9999999)) . uniqid())
            ]);
    
    
            //try{
            $attributes = $request->validate(
                [
                    'full_name' => 'required|max:50|min:3',
                    'phone' => 'required|digits_between:8,13|numeric',
                    'email' => 'required|email|max:100|unique:user3s,email',
                    'guest' => 'required',
                    'username' => 'required',
                    'password' => 'required',
                    'date'=> 'required|date',
                    'time'=> 'required',
                    'table_id'=> 'required|numeric',
                    'details'=> 'required|string|max:200',
                    'pax'=> 'required|numeric'
                ],
                [
                    'email.unique' => 'An account already exists with this email. You can just log in. :)'
                ]
            );
            $guest = User3::where('email',$attributes['email'])->where('guest',1)->first();

            
            //Check an iparxi idi guest me tuto to email j kame update ta data tou if yes
            if($guest){
                $guest->update($attributes);
            }else{
                $guest = User3::create($attributes);
            }
            $guest_id = $guest->id;

            $request = request()-> merge([
                'attended' => 0
            ]);
           
            $validatedData = $request->validate([
                'date'=> 'required',
                'time'=> 'required',
                'table_id'=> 'required',
                'details'=> 'required',
                'pax'=> 'required',
                'attended' => 'required'
            ]);

            $validatedData['user3_id'] = $guest_id;
            $reservation = Reservation::create($validatedData);
            
            return $reservation;
        }
        else
        {
            $request = request()-> merge([
                'attended' => 0
            ]);
            
           
            $validatedData = $request->validate([
                'user3_username' => 'required|max:50|min:3|exists:user3s,username',//
                'date'=> 'required|date',
                'time'=> 'required',
                'table_id'=> 'required|numeric',
                'details'=> 'required|string|max:200',
                'pax'=> 'required|numeric',
                'attended' => 'required'
            ]);
            

            // return $validatedData;
            $user3_id = User3::where('username', $validatedData['user3_username'])->first()->id;
            $validatedData['user3_id'] = $user3_id;
            unset($validatedData['user3_username']);
            $reservation = Reservation::create($validatedData);
            
            return $reservation;
        }
        //get data from the request if not logged in
        //return (request());
        
            
        
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
