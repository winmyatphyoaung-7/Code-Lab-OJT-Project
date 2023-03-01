<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Like;
use App\Models\Save;
use Inertia\Inertia;
use App\Models\Course;
use App\Models\Comment;
use App\Models\SaveForLater;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UCourseController extends Controller
{
    //direct course detail page
    public function courseDetail($id){
        $course = Course::select('courses.*' , 'categories.name as categoryName')
        ->leftJoin('categories', 'courses.category_id' , 'categories.id')
        ->where('courses.id' , $id)->first();
        $like = Like::where('user_id' , Auth::user()->id)->where('course_id' , $id)->get();
        $save = Save::where('user_id' , Auth::user()->id)->where('course_id' , $id)->get();
        $cart = Cart::where('user_id' , Auth::user()->id)->where('course_id' , $id)->get();
        $laterCart = SaveForLater::where('user_id' , Auth::user()->id)->where('course_id' , $id)->get();
        $cartForNav = Cart::where('user_id' , Auth::user()->id)->get();
        $comment = Comment::leftJoin('users' , 'comments.user_id' , 'users.id')
        ->select('comments.*' , 'users.name as userName' , 'users.image as userImage' )
        ->where('comments.course_id' , $id)->get();
        return Inertia::render('User/course/CourseDetail',compact(['course','like','save','cart','cartForNav','laterCart','comment']));
    }
}
