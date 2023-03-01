<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Like;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class AdminController extends Controller
{
    //direct home page
    public function homePage()
    {
        $course = Course::when(request('search'), function ($query, $search) {
            $query->where('courses.name', 'like', '%' . $search . '%');
        })->select('courses.*', 'categories.name as categoryName', DB::raw('(SELECT COUNT(*) FROM likes WHERE likes.course_id = courses.id) as likes_count'), DB::raw('(SELECT COUNT(*) FROM comments WHERE comments.course_id = courses.id) as comments_count'))
            ->leftJoin('categories', 'courses.category_id', 'categories.id')
            ->orderBy('created_at', 'desc')
            ->get();
        $likeList = [];
        $commentList = [];
        $filters = request('search');
        return Inertia::render('Admin/Home', compact(['course', 'likeList', 'commentList','filters']));
    }

    //direct profile page
    public function profilePage()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return Inertia::render('Admin/Account/Profile', compact('user'));
    }

    //direct confirm password page
    public function confirmPasswordPage()
    {
        return Inertia::render('Admin/Account/Confirm');
    }

    //confirm password
    public function confirmPassword(Request $request)
    {
        $this->passwordValidationCheck($request);
        $user = User::select('password')->where('id', Auth::user()->id)->first();
        $dbPassword = $user->password;
        // dd(Hash::check($request->password,$dbPassword));
        if (Hash::check($request->password, $dbPassword)) {
            return Inertia::render('Admin/Account/Success');
        } else {
            return redirect()->route('admin#confirmPasswordPage')->with(['notMatch' => 'The Old Password Not Match. Try Again!']);
        }
    }

    //direct edit profile page
    public function editProfilePage()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return Inertia::render('Admin/Account/EditProfile', compact('user'));
    }

    //edit profile
    public function editProfile($id, Request $request)
    {
        $this->profileUpdateValidation($request);
        if ($request->hasFile('profileImage')) {
            $user = User::where('id', $id)->first();
            $oldImageName = $user->image;

            if ($oldImageName != null) {
                unlink(public_path('storage/' . $oldImageName));
            }
            $fileName = uniqid() . $request->file('profileImage')->getClientOriginalName();
            $request->file('profileImage')->storeAs('public', $fileName);

            User::where('id', $id)->update(['image' => $fileName]);
        }
        User::where('id', $id)->update([
            'name' => $request->profileName,
            'email' => $request->profileEmail,
            'phone' => $request->profilePhone,
            'gender' => $request->profileGender,
            'address' => $request->profileAddress,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('admin#profilePage')->with(['profileUpdate' => 'Profile Edited Successfully!']);
    }

    //change password page
    public function changePasswordPage()
    {
        return Inertia::render('Admin/Account/ChangePassword');
    }

    //change password
    public function changePassword(Request $request)
    {
        $this->ValidationCheckForChangePass($request);
        $currentUserId = Auth::user()->id;
        $dbPass = User::select('password')->where('id', $currentUserId)->first();
        $dbPass = $dbPass->password;
        // dd(Hash::check($request->oldPassword,$dbPass));
        if (Hash::check($request->oldPassword, $dbPass)) {
            $data = [
                'password' => Hash::make($request->password),
            ];
            User::where('id', $currentUserId)->update($data);
        } else {
            return back()->with(['notMatch' => 'The Old Password Not Match. Try Again!']);
        }
        return redirect()->route('admin#homePage')->with(['changePasswordSuccess' => 'Password Changed Successfully!']);
    }

    //admin list page
    public function adminListPage()
    {
        $adminList = User::when(request('search'), function ($query, $search) {
            $query->where('email', 'like', '%' . $search . '%');
        })->where('role', 'admin')->paginate(4)->withQueryString();
        return Inertia::render('Admin/List/AdminList', [
            'adminList' => $adminList,
            'filters' => request('search'),
        ]);
    }

    //user list page
    public function userListPage()
    {
        $userList = User::when(request('search'), function ($query, $search) {
            $query->where('email', 'like', '%' . $search . '%');
        })->where('role', 'user')->paginate(4)->withQueryString();
        return Inertia::render('Admin/List/UserList', [
            'userList' => $userList,
            'filters' => request('search'),
        ]);
    }

    //change role
    public function changeRole($id, Request $request)
    {
        if ($request->value == 'user') {
            User::where('id', $id)->update([
                'role' => 'admin',
            ]);
            return redirect()->back();
        } else {
            User::where('id', $id)->update([
                'role' => 'user',
            ]);
            return redirect()->back();
        }
    }

    //number of like list for each course
    public function likeList($id)
    {
        $likeList = Like::where('course_id', $id)
            ->leftJoin('users', 'likes.user_id', 'users.id')
            ->select('likes.*', 'users.name as userName', 'users.image as userImage')
            ->get();
        $course = Course::select('courses.*', 'categories.name as categoryName', DB::raw('(SELECT COUNT(*) FROM likes WHERE likes.course_id = courses.id) as likes_count'), DB::raw('(SELECT COUNT(*) FROM comments WHERE comments.course_id = courses.id) as comments_count'))
            ->leftJoin('categories', 'courses.category_id', 'categories.id')
            ->orderBy('created_at', 'desc')
            ->get();
        $commentList = [];
        $showLike = true;
        return Inertia::render('Admin/Home', compact(['course', 'likeList', 'commentList', 'showLike']));
    }

    //number of comment list for each course
    public function commentList($id)
    {
        $commentList = Comment::where('course_id', $id)
            ->leftJoin('users', 'comments.user_id', 'users.id')
            ->select('comments.*', 'users.name as userName', 'users.image as userImage')
            ->get();
        $course = Course::select('courses.*', 'categories.name as categoryName', DB::raw('(SELECT COUNT(*) FROM likes WHERE likes.course_id = courses.id) as likes_count'), DB::raw('(SELECT COUNT(*) FROM comments WHERE comments.course_id = courses.id) as comments_count'))
            ->leftJoin('categories', 'courses.category_id', 'categories.id')
            ->orderBy('created_at', 'desc')
            ->get();
        $likeList = [];
        $showComment = true;
        return Inertia::render('Admin/Home', compact(['course', 'likeList', 'commentList', 'showComment']));
    }

    //password validation check
    private function passwordValidationCheck($request)
    {
        Validator::make($request->all(), [
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ])->validate();
    }

    //profile update validation
    private function profileUpdateValidation($request)
    {
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
    private function ValidationCheckForChangePass($request)
    {
        Validator::make($request->all(), [
            'oldPassword' => 'required',
            'password' => 'required|min:8|max:20',
            'confirmPassword' => 'required|same:password',
        ])->validate();
    }
}
