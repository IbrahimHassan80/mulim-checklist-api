<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contactus;

class contactuscontroller extends Controller
{
    public function storeMessage(Request $request){
        $rules = [
            'message'  => 'required|min:10',
        ];
       
        $validator = validator::make($request->all(), $rules);

        if($validator->fails()){
                return response()->json([
                    'message' => 'the given data was invalid',
                    'errNum'  => 500,
                    'error'   => $validator->errors(),
                ]);
        }
        $contact = Contactus::create([
            'message' => $request->message,
        ]);
        return "tahnk you for your message";

    }
}
