<?php

namespace App\Http\Controllers\User;

use App\Models\Like;
use App\Models\Save;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //like unlike course
    public function like($id , Request $request){
        if($request->value == 1) {
            Like::create([
                'user_id' => Auth::user()->id,
                'course_id' => $id
            ]);
            return back();
        }else{
            Like::where('user_id' , Auth::user()->id)->where('course_id' , $id)->delete();
            return back();
        }
    }

    //save unsave course
    public function save($id , Request $request){
        if($request->value == 1) {
            Save::create([
                'user_id' => Auth::user()->id,
                'course_id' => $id
            ]);
            return \redirect()->back();
        }else{
            Save::where('user_id' , Auth::user()->id)->where('course_id' , $id)->delete();
            return \redirect()->back();
        }
    }
}
