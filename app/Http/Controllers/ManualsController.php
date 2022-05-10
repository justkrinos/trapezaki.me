<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class ManualsController extends Controller
{
    public function showU1(){
        $menu = "User1_Manual.pdf";
        $file = File::get(public_path('assets/manuals/') . $menu);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }

    public function showU2(){
        $menu = "User2_Manual.pdf";
        $file = File::get(public_path('assets/manuals/') . $menu);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }

    public function showU3(){
        $menu = "User3_Manual.pdf";
        $file = File::get(public_path('assets/manuals/') . $menu);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }
}
