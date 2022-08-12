<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

class PropertiesController extends Controller
{

    public function __construct()
    {
        $this->properties = new Properties();
    }

    public function index()
    {
        $properties = Properties::get();
        // dd($properties);
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

    //ajaxで一覧表示
    public function showAll()
    {
        $properties = Properties::get();

        // dd($properties);

        $propertiesList = [];
        foreach ($properties as $property) {
            $propertiesList[] = array(
                'id' => $property->id,
                'properties_name' => $property->properties_name,
                'address' => $property->address,
                'building_age' => $property->building_age,
                'rent' => $property->rent
            );
        }
        //  ヘッダーを指定することによりjsonの動作を安定させる
        // header('Content-type: application/json');

        // dd($propertiesList);

        //　HTMLへ渡す配列$properiesListをjsonに変換する
        return json_encode($propertiesList, JSON_UNESCAPED_UNICODE);
    }

    public function showDetail(Request $request)
    {
        log::info($request);

        //取得できない可能性あり
        $id = $request['id'];
        log::info($id);

        $property_info = Properties::where('id', $id)->get();

        $property_detail = [];
        foreach ($property_info as $property) {
            $property_detail[] = array(
                'id'    => $property->id,
                'properties_name' => $property->properties_name,
                'address' => $property->address,
                'building_age' => $property->building_age,
                'rent' => $property->rent
            );
        }
        $data = json_encode($property_detail, JSON_UNESCAPED_UNICODE);
        return response()->json($data);
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
