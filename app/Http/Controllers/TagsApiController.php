<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagsApiController extends Controller
{
    public  function show() {
        $tag = Tag::all()->pluck('name')->toArray();
        return response($tag);
    }
}
