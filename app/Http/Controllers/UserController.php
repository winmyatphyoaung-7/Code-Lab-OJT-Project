<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Save;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Course;
use App\Models\Category;
use App\Models\SaveForLater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //direct home page
    public function homePage(){
        $category = Category::get();
        $recommendCourse = Course::where('recommend' , '1')->get();
        $course = Course::select('courses.*' , 'categories.name as categoryName', DB::raw('(SELECT COUNT(*) FROM likes WHERE likes.course_id = courses.id) as likes_count'))
        ->leftJoin('categories','courses.category_id' , 'categories.id')
        ->orderBy('created_at' , 'desc')
        ->get();
        $cart = Cart::where('user_id' , Auth::user()->id)->get();
        return Inertia::render('User/Home',compact(['category','recommendCourse','course' , 'cart']));
    }

    //search with category
    public function categorySearch($id){
        $recommendCourse = Course::where('recommend' , '1')->get();
        $course = $course = Course::select('courses.*' , 'categories.name as categoryName')
        ->leftJoin('categories','courses.category_id' , 'categories.id')
        ->where('courses.category_id' , $id)
        ->orderBy('created_at' , 'desc')
        ->get();
        $cartForNav = Cart::where('user_id' , Auth::user()->id)->get();
        return Inertia::render('User/CategoryFilter',compact(['course','recommendCourse','cartForNav']));
    }

    //direct save page
    public function savePage(){
        $recommendCourse = Course::where('recommend' , '1')->get();
        $course = Save::select('saves.*' , 'courses.name','courses.description','courses.image','courses.category_id','courses.price','courses.student','courses.qty','courses.duration','courses.start_date' , 'categories.name as categoryName' ,'courses.id as courseId')
        ->leftJoin('courses','saves.course_id' , 'courses.id')
        ->leftJoin('categories' ,'courses.category_id' , 'categories.id')
        ->where('user_id' , Auth::user()->id)
        ->orderBy('created_at' , 'desc')
        ->get();
        $cartForNav = Cart::where('user_id' , Auth::user()->id)->get();
        return Inertia::render('User/course/Save',compact(['course' , 'recommendCourse' ,'cartForNav']));
    }

    //direct cart page
    public function cartPage(){
        $recommendCourse = Course::where('recommend' , '1')->get();
        $cart = Cart::leftJoin('courses' , 'carts.course_id' , 'courses.id')
        ->leftJoin('categories' , 'courses.category_id' , 'categories.id')
        ->select('carts.*' , 'courses.name','courses.description','courses.image','courses.category_id','courses.price','courses.student','courses.qty','courses.duration','courses.start_date' , 'categories.name as categoryName' ,'courses.id as courseId' )
        ->where('user_id' , Auth::user()->id)
        ->orderBy('created_at' , 'desc')
        ->get();
        $saveForLater = SaveForLater::leftJoin('courses','save_for_laters.course_id' , 'courses.id')
        ->leftJoin('categories' , 'courses.category_id' , 'categories.id')
        ->select('save_for_laters.*' , 'courses.name','courses.description','courses.image','courses.category_id','courses.price','courses.student','courses.qty','courses.duration','courses.start_date' , 'categories.name as categoryName' ,'courses.id as courseId')
        ->where('user_id' , Auth::user()->id)
        ->orderBy('created_at' , 'desc')
        ->get();
        return Inertia::render('User/Cart/Cart',compact(['recommendCourse','cart','saveForLater']));
    }

    //direct profile edit page
    public function profileEditPage(){
        $cartForNav = Cart::where('user_id' , Auth::user()->id)->get();
        $user = Auth::user();
        return Inertia::render('User/Account/EditProfile',compact('user','cartForNav'));
    }

    //profile edit
    public function profileEdit(Request $request){
        $this->profileUpdateValidation($request);
        if($request->hasFile('profileImage')) {
            $user = User::where('id', Auth::user()->id)->first();
            $oldImageName = $user->image;

            if ($oldImageName != null) {
                unlink(public_path('storage/'.$oldImageName));
            }
            $fileName = uniqid() . $request->file('profileImage')->getClientOriginalName();
            $request->file('profileImage')->storeAs('public', $fileName);

            User::where('id' , Auth::user()->id)->update(['image' => $fileName]);
        }
        User::where('id' , Auth::user()->id)->update([
            'name' => $request->profileName,
            'email' => $request->profileEmail,
            'phone' => $request->profilePhone,
            'gender' => $request->profileGender,
            'address' => $request->profileAddress,
            'updated_at' => Carbon::now()
        ]);
        return redirect()->route('user#homePage')->with(['profileUpdate' => 'Profile Edited Successfully!']);
    }

    //change password page
    public function changePasswordPage(){
        return Inertia::render('User/Account/ChangePassword');
    }

    //change password
    public function changePassword(Request $request){
        $this->ValidationCheckForChangePass($request);
        $currentUserId = Auth::user()->id;
        $dbPass = User::select('password')->where('id',$currentUserId)->first();
        $dbPass = $dbPass->password;

        if(Hash::check($request->oldPassword,$dbPass)) {
            $data = [
                'password' => Hash::make($request->password)
            ];
            User::where('id',$currentUserId)->update($data);
            return redirect()->route('user#homePage')->with(['changePasswordSuccess' => "Success ! We've changed your password"]);
        }else{
            return back()->with(['wrongPassword' => 'Please Check Your Password Again!']);
        }
    }

    



    //profile update validation
    private function profileUpdateValidation($request) {
        $validation = [
            'profileName' => 'required',
            'profileEmail' => 'required|email',
            'profilePhone' => 'required',
            'profileGender' => 'required',
            'profileAddress' => 'required',
        ];

        if ($request->hasFile('profileImage')) {
            $validation['profileImage'] = 'mimes:png,jpg,jpeg|file';
        }

        Validator::make($request->all(), $validation)->validate();
    }

    //validation check for change password
    private function ValidationCheckForChangePass($request){
        Validator::make($request->all(),[
            'oldPassword' => 'required',
            'password' => 'required|min:8|max:15',
            'confirmPassword' => 'required|same:password'
        ])->validate();
    }
}
