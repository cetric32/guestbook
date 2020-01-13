<?php

namespace App\Http\Controllers;

use App\Signature;
use Illuminate\Http\Request;

class SignaturesController extends Controller
{
    function getAllSignatures(){
        $signatures  = Signature::all();

        return $signatures;
    }

    function saveSignature(Request $request){
        $signature = new Signature();

        $signature->name = $request->name;
        $signature->email = $request->email;
        $signature->body = $request->body;
        $signature->flagged_at = $request->flagged_at ? $request->flagged_at : null;

        $signature->save();

        return response()->json([
            'message' => 'data saved successfully'
        ]);
    }

    function getSignature(Request $request,$id){
        if(Signature::where('id',$id)->exists()){
            return 'yes';
        }
        else{
            return response()->json([
                'message' => 'data not found'
            ],404);
        }
    }
}
