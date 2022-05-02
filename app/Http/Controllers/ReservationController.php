<?php

namespace App\Http\Controllers;

use App\Models\User3;
use App\Models\User2;
use App\Models\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function showResvU3(User2 $user2){
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

    public function createResvU3(){
        //get data from the request if not logged in
        if (!Auth::check('user3')) {
            $fullname = session()->get('full_name');
            $phone = session()->get('phone');
            $email = session()->get('email');

            //TODO: opu eshi validation numeric na to kamume nan min:0 j na valume max an xriazete (px. pax <=16)
            //TODO: an den valis date fkalli error logika epd en bori nan null otan mpei sto table (ekama to null sta migrations check if works)
            $validatedData = request()->validate([
                'date'=> 'required|date',
                'time'=> 'required|date_format:H:i',
                'table_id'=> 'required|numeric|min:0',
                'details'=> 'string|max:200',
                'pax'=> 'required|numeric|min:0|max:16'
            ]);

            //TODO: na gini uncomment tuto j na checkaristi an en ok
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

            $reservation = $guest->reservations()->create($validatedData);

            if(str_ends_with(env('APP_URL'),'.me')) //stelni email mono o server oi sto local
            {

                $user2 = User2::find(Table::find($reservation->table_id)->user2_id);
                Mail::to($guest->email)->queue(new \App\Mail\MailCreatedReservation
                    ($guest->email, $reservation, $user2->business_name));
            }

            session()->forget('date');
            session()->forget('people');

            return $reservation;

        } else {
            $user = Auth::guard('user3')->user();
            $request = request()-> merge([
                'user3_id' => $user->id,
                'attended' => 0
            ]);

            $validatedData = $request->validate([
                'date'=> 'required|date',
                'time'=> 'required|date_format:H:i',
                'table_id'=> 'required|numeric',
                'details'=> 'string|max:200',
                'user3_id' => "required",
                'pax'=> 'required|numeric',
                'attended' => 'required'
            ]);

            if(str_ends_with(env('APP_URL'),'.me')) //stelni email mono o server oi sto local
            {
                $reservation = Reservation::create($validatedData);
                $user2 = User2::find(Table::find($reservation->table_id)->user2_id);
                Mail::to($user->email)->queue(new \App\Mail\MailCreatedReservation
                    ($user->email, $reservation, $user2->business_name));
            }
            else
            {
                $reservation = Reservation::create($validatedData);
            }
            //TODO na men kamni return reservation afu en dia pisw ta data
            //sto eggrafo egrapsa epistrefei success
            return $reservation;
        }
    }

    public function createResvU2(){
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
                    'password' => 'required'
                ],
                [
                    'email.unique' => 'An account already exists with this email.'
                ]
            );

            $request = request()-> merge([
                'attended' => 0
            ]);

            $validatedData = $request->validate([
                'date'=> 'required|date|after:yesterday',
                'time'=> 'required',
                'table_id'=> 'required|numeric',
                'details'=> 'required|string|max:200',
                'pax'=> 'required|numeric',
                'attended' => 'required'
            ]);

            $guest = User3::where('email',$attributes['email'])->where('guest',1)->first();

            //Check an iparxi idi guest me tuto to email j kame update ta data tou if yes
            if($guest){
                $guest->update($attributes);
            }else{
                $guest = User3::create($attributes);
            }


            $validatedData['user3_id'] = $guest->id;
            $reservation = Reservation::create($validatedData);

            //TODO: na men kamnei return to reservation
            return $reservation;
        }
        else
        {
            $request = request()-> merge([
                'attended' => 0
            ]);


            $validatedData = $request->validate([
                'user3_username' => 'required|max:50|min:3|exists:user3s,username',//
                'date'=> 'required|date|after:yesterday',
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

    public function showEditResv(){
            $validated  = request()->validate([
                'id' => 'required|numeric|exists:reservations,id',
            ]);
            //ddd($validated);
            $user2 = Auth::guard('user2')->user();
            $reservation = Reservation::where('id', $validated['id'])->first();

            //check if the authorised user 2 has that table where the reservation is placed
            if($user2->tables()->where('id',$reservation->table_id)->exists()){
                return view('business.edit-resv',[
                    'reservation' => $reservation,
                    'user3'        => $reservation->user3
                ]);
            }

            return back();
    }

    public function editResvU2(){
        $validatedData = request()->validate([
            'date'=> 'required|date|after:yesterday',
            'time'=> 'required', //TODO: validate this
            'table_id'=> 'numeric',
            'id' => 'required|exists:reservations,id',
            'details'=> 'required|string|max:200',
            'pax'=> 'required|numeric|min:2|max:16',
        ],[
            'pax.required' => 'The people field is required.'
        ]);

        //check if the reservation is owned by the business
        $reservation = Reservation::find($validatedData['id']);

        $currentTableOwnerId = $reservation->table->user2->id;
        $user2 = Auth::guard('user2')->user();
        $currentUserId = $user2->id;

        //dont continue if reservsation is not owned by auth user
        if($currentTableOwnerId != $currentUserId)
            return response()->json([], 422);

        //check an eshi table j an en diko tu to table allios go back
        $selectedTable = 0;
        if(array_key_exists('table_id',$validatedData)){
            $selectedTable = Table::find($validatedData['table_id']);
            if($selectedTable->user2->id != $currentUserId)
                return response()->json([],422);
        }

        //an exw selected table tote piannw to capacity tu jinu
        //an den exw tote piannw to p to table tu arxiku reservation
        $tableCapacity = $selectedTable ? $selectedTable->capacity : $reservation->table->capacity;

        //an to pax den en mesa sta apodekta oria tote stile ton pisw
        if($validatedData['pax'] < 2 || $validatedData['pax'] > $tableCapacity){
            return response()->json([],422);
        }

        $user3 = User3::find($reservation->user3_id);
        if(str_ends_with(env('APP_URL'),'.me')) //stelni email mono o server oi sto local
                        Mail::to($user3->email)->queue(new \App\Mail\MailModifiedReservation
                                                    ($user3->email, $reservation, $user2->business_name));
        //update the reservations details
        $reservation->update($validatedData);

        return 'success';

    }

    public function showAddResv() {
        return view('business.add-resv');
    }
}
