<?php

namespace App\Http\Controllers;
use App\Models\User2;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show(User2 $user2)
    {
        $file = File::get(public_path('assets/menus/') . $user2->menu);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }
}
