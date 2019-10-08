<?php

namespace App\Http\Controllers\Profile;
use App\Http\Controllers\Controller;
use App\Model\Profile;
use App\Model\User;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends  Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $data = Auth::user()->profile()->get();
        return response()->json(['data',$data],200);
    }

    public function UpdateProfile(Request $request){
        $Profile_find = Profile::find($request->profile_id)->first();
        if($Profile_find->fill($request->all())->save()){
            return response()->json(['status' => 'success']);
        }
        return response()->json(['status' => 'failed']);
    }

}
