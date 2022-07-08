<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->properties = new Properties();
    // }

    public function index()
    {
        $properties = Properties::get();

        return view('index', compact('properties'));
    }

    public function show($id, Request $request)
    {
        $properties = Properties::find($id);

        if (!$properties) {
            return redirect('properties')->with('flash_message', '情報がありません。');
        }

        return view('properties.show')->with([
            'properties' => $properties
        ]);
    }
}
