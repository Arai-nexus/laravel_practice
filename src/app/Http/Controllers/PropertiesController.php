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

        return view('index')->with(['properties' => $properties]);
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

    public function regist()
    {
        return view('properties.regist');
    }


    public function store(Request $request)
    {
        Properties::create([
            $properties = 'properties_name' => $request->name,
            $properties = 'address' => $request->address,
            $properties = 'building_age' => $request->age,
            $properties = 'rent' => $request->rent,
        ]);
        return redirect()->with($properties);
    }

    /**
     * @param 
     * @return
     */
    public function edit($id)
    {
        $selected_property = Properties::find($id);
        return view('properties.edit')->with('selected_property', $selected_property);
    }

    public function editConfirm(Request $request, $id)
    {
        return view('properties.editConfirm')->with([
            'test' => $request,
            'id' => $id
        ]);
    }

    public function editComplete(Request $request, $id)
    {
        $properties = Properties::find($id);

        $properties->properties_name = $request->name;
        $properties->address = $request->address;
        $properties->building_age = $request->age;
        $properties->rent = $request->rent;

        $properties->save();

        return redirect('/');
    }

    public function delete($id)
    {
        $book = Properties::find($id);
        $book->delete();
        return redirect('/');
    }

    // public function search(Request $request)
    // {
    //     $keyword = $request->input('keyword');

    //     $query = Properties::query();

    //     if(!empty($keyword)) {
    //         $query->where('name', 'LIKE', "%{$keyword}%")
    //             ->orWhere('address', 'LIKE', "%{$keyword}%");
    //     }

    //     $posts = $query->get();

    //     return view('index', compact('posts', 'keyword'));
    // }
}
