<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    //

    public function getIndex()
    {
        $query = \App\Properties::query();

        $properties = $query->orderBy('id', 'desc')->paginate(5);
        return view('properties.list')->with('properties', $properties);
    }
}
