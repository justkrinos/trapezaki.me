<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

abstract class ProfileController extends Controller
{
    public abstract function modify();
    public abstract function show();
}
