<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\dataxmodl;
class dataxs extends Controller
{
    public function showw(){
        $l=dataxmodl::all();
        return response()->json(['data'=>$l]);
    }
    public function postd(Request $s){
        $t=Validator::make($s->all(),[
            'name'=>'required',
            'stock'=>'required'
        ]);
        if ($t->fails()) {
            return response()->json($t->errors());
        } else {
            $r=dataxmodl::create([
                'name'=>$s->name,
                'stock'=>$s->stock
            ])->save();
            return response()->json([
                'msg'=>'sucees'
            ]);
        }
    }
    public function singel($id){
        $t=dataxmodl::find($id);
        return response()->json($t);
    }
}
