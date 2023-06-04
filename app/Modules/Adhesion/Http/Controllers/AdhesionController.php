<?php

namespace App\Modules\Adhesion\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Adhesion\Models\Adhesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdhesionController extends Controller
{

    public function index()
    {

        $adhesions = Adhesion::all();

        return [
            "payload" => $adhesions,
            "status" => "200_00"
        ];
    }

    public function get($id)
    {
        $adhesion = Adhesion::find($id);
        if (!$adhesion) {
            return [
                "payload" => "The searched row does not exist !",
                "status" => "404_1"
            ];
        } else {
            
            return [
                "payload" => $adhesion,
                "status" => "200_1"
            ];
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
        ]);
        if ($validator->fails()) {
            return [
                "payload" => $validator->errors(),
                "status" => "406_2"
            ];
        }
        
        $adhesion = Adhesion::make($request->all());
        $adhesion->save();
     
        return [
            "payload" => $adhesion,
            "status" => "200"
        ];
    }

   

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "id" => "required",
        ]);
        if ($validator->fails()) {
            return [
                "payload" => $validator->errors(),
                "status" => "406_2"
            ];
        }
        $adhesion = Adhesion::find($request->id);
        if (!$adhesion) {
            return [
                "payload" => "The searched row does not exist !",
                "status" => "404_3"
            ];
        }

        $adhesion->username = $request->username;
        $adhesion->lastName = $request->lastName;
        $adhesion->firstName = $request->firstName;
        $adhesion->email = $request->email;
        $adhesion->phoneNumber = $request->phoneNumber;

        $adhesion->save();
    
        return [
            "payload" => $adhesion,
            "status" => "200"
        ];
    }

    public function delete(Request $request)
    {
        $adhesion = Adhesion::find($request->id);
        if (!$adhesion) {
            return [
                "payload" => "The searched row does not exist !",
                "status" => "404_4"
            ];
        } else {
            $adhesion->delete();
            return [
                "payload" => "Deleted successfully",
                "status" => "200_4"
            ];
        }
    }

}
