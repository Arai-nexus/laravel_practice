<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Properties;

class PropertiesController extends Controller
{
    //

    public function index()
    {
        $properties = Properties::get();

        return view('index')
            ->with('properties', $properties);
    }
}
