<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Helper;
use Validator;
class syscontrol extends Controller
{
    public function register(Request $r){
        $t=Validator::make($r->all(),[
            'name'=>'required|min:5',
            'email'=>'required|email',
            'password'=>'required|min:7'
        ]);
        if ($t->fails()) {
           return response()->json([
               $t->errors()
           ]);
        } else {
            
            $byc=bcrypt($r->password);
            $s=User::create([
                'name'=>$r->name,
                'email'=>$r->email,
                'api_token'=>$byc,
                'password'=>bcrypt($r->password),
            ])->save();
            return response()->json([
                'msg'=>'succes',
                'token'=>$byc
            ]);
        }
    }
    public function login(Request $r){
        $s=Validator::make($r->all(),[
            'name'=>'required',
            'password'=>'required'
        ]);
        if ($s->fails()) {
             return response()->json($s->errors());            
        }else {
            if (Auth::attempt([
                'name'=>$r->name,
                'password'=>$r->password
            ])) 
            {
                return response()->json([
                    'status'=>'success',
                    'token'=>Auth::user()->api_token
                ]);
            } else {
               return response()->json([
                   'msg'=>'fails'
               ]);
            }
        }
    }
    public function sa(){
        
    }

}
