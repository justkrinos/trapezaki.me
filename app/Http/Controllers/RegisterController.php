<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class RegisterController extends Controller
{
    public abstract function create();
    public abstract function show();
}
