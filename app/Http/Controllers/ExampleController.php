<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index($id){
        $response = (object) [
            "rc" => "00",
            "desc" => "Sukses",
            "data" => (object) [
                "id" => $id
            ]
        ];
        return response()->json($response, 200);
    }

    public function post(){
        if(!$request->isJson()){
            $response = (object) [
                "rc" => "99",
                "desc" => "Content-Type wrong",
                "data" => "Content-Type:application/json"
            ];
            return response()->json($response, 200);
        }

        $data = json_decode($request->getContent());

        $response = (object) [
            "rc" => "00",
            "desc" => "Sukses",
            "data" => (object) [
                "id" => $data
            ]
        ];
        return response()->json($response, 200);
    }
}
