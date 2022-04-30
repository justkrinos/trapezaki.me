<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use App\Models\User2;



class MenuController extends Controller
{
    public function showU3(User2 $user2){
        $menu = $user2->menu;
        $file = File::get(public_path('assets/menus/') . $menu);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }

    public function showU2(){
        $menu = Auth::guard('user2')->user()->menu;
        $file = File::get(public_path('assets/menus/') . $menu);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }

    public function modify(){
            $validatedData = request()->validate([
                'menu' => "required|mimes:pdf|max:10000"
            ],[
                'menu.required' => 'You must select a file.'
            ]);

            $id = Auth::guard('user2')->user()->id;
            $oldMenu = Auth::guard('user2')->user()->menu;

            $menuName = time() . strval($id) . uniqid() . '.' . request()->file('menu')->extension();
            request()->file('menu')->move(public_path('assets/menus/'), $menuName);

            File::delete('assets/menus/' . $oldMenu);


            $user = User2::where("id", $id)->first();
            $user->menu =$menuName;
            $user->save();

            return back()->with("success", "The Menu has been uploaded successfully");
    }


}
