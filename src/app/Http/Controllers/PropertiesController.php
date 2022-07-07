<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properties;
use Illuminate\Support\Facades\Auth;

class PropertiesController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $id = $user->id;
        $properties = Properties::where('id', $id)->latest()->paginate(5);

        return view('index')
            ->with('properties', $properties);
    }
}
