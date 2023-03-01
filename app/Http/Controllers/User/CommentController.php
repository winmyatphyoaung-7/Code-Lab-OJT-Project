<?php

namespace App\Http\Controllers\User;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //course comment
    public function comment($id,Request $request){
        Comment::create([
            'course_id' => $id,
            'user_id' => Auth::user()->id,
            'comment' => $request->comment
        ]);

        return back();
    }

    //delete comment
    public function delete($id){
        Comment::where('id' , $id)->delete();
        return back();
    }

    //update comment
    public function update($id ,Request $request){
        Comment::where('id' , $id)->update([
            'comment' => $request->editComment
        ]);
        return back();
    }
}
