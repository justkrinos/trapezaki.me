<?php

namespace App\Http\Controllers;

abstract class SessionsController extends Controller
{

    public abstract function logout();

    public abstract function show();

    public  abstract function login();

}
