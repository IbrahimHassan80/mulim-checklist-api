<?php

namespace App\Http\Controllers\resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class Questioncontroller extends Controller
{
    public function readquran(Request $request){
        $rules = [
            'status' => 'required',
        ];
        $validator = validator::make($request->all(), $rules);
        
        if($validator->fails()){
                return response()->json([
                    'message' => 'the given data was invalid',
                    'errNum' => 500,
                    'error' => $validator->errors(),
                ]);
        }

          $data = Question::create([
                  'question' => 'قراءة القران',
                  'status'   => $request->status,
                  'user_id'  => auth()->user()->id
              ]);
              if($data){
                  return "good";
              }    
        
    }
    public function memorizesQuran(Request $request){
        $rules = [
            'status' => 'required',
        ];
        $validator = validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json([
                'message' => 'the given data was invalid',
                'errNum' => 500,
                'error' => $validator->errors(),
            ]); 
        }
            $data = Question::create([
                    'question' => 'حفظ من القرءان',
                    'status'   => $request->status,
                    'user_id'  => auth()->user()->id
                ]);
         if($data){
          return "good";
          }    
    }

    public function ablution(Request $request){
        $rules = [
            'status' => 'required',
        ];
        $validator = validator::make($request->all(), $rules);
        if($validator->fails()){
                return response()->json([
                    'message' => 'the given data was invalid',
                    'errNum' => 500,
                    'error' => $validator->errors(),
                ]); 
            }
             $data = Question::create([
              'question' => 'هل قمت بالوضوء قبل النوم',
              'status'   => $request->status,
              'user_id'  => auth()->user()->id
                 ]);
             if($data){
              return "good";
              }
        }

    public function fasting(Request $request){
        $rules = [
            'status' => 'required',
        ];
        $validator = validator::make($request->all(), $rules);
        if($validator->fails()){
                return response()->json([
                    'message' => 'the given data was invalid',
                    'errNum' => 500,
                    'error' => $validator->errors(),
                ]); 
            }
                $data = Question::create([
                        'question' => 'هل انت صائم اليوم؟',
                        'status'   => $request->status,
                        'user_id'  => auth()->user()->id
                    ]);
             if($data){
              return "good";
              }
    }
}