<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    //direct list page
    public function listPage()
    {
        $course = Course::when(request('search'), function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->orderBy('created_at' , 'desc')->paginate(5)->withQueryString();
        return Inertia::render('Admin/Course/List', [
            'course' => $course,
            'filters' => request('search'),
        ]);
    }

    //direct create page
    public function createPage(){
        $category = Category::get();
        return Inertia::render('Admin/Course/Create',compact('category'));
    }

    //create course
    public function create(Request $request) {
        $this->courseValidationCheck($request);
        
        $fileName = uniqid() . $request->file('courseImage')->getClientOriginalName();
        $request->file('courseImage')->storeAs('public', $fileName);
        Course::create([
            'name' => $request->courseName,
            'description' => $request->courseDescription,
            'image' => $fileName,
            'category_id' => $request->courseCategory,
            'price' => $request->coursePrice,
            'qty' => $request->courseQty,
            'start_date' => $request->courseStartDate,
            'duration' => $request->courseDuration
        ]);

        return redirect()->route('course#listPage')->with(['courseCreate' => 'Course Created Successfully!']);
    }

    //direct course edit page
    public function editPage($id){
        $course = Course::where('id' , $id)->first();
        $category = Category::get();
        return Inertia::render('Admin/Course/Edit',compact(['course','category']));
    }

    //course edit
    public function edit(Request $request , $id){
        $this->courseValidationCheck($request);
        if($request->hasFile('courseImage')) {
            $oldImageName = Course::where('id', $id)->first();
            $oldImageName = $oldImageName->image;

            if ($oldImageName != null) {
                
                unlink(public_path('storage/'.$oldImageName));
            }
            $fileName = uniqid() . $request->file('courseImage')->getClientOriginalName();
            $request->file('courseImage')->storeAs('public', $fileName);

            Course::where('id' , $id)->update(['image' => $fileName]);
        }
        Course::where('id' , $id)->update([
            'name' => $request->courseName,
            'description' => $request->courseDescription,
            'category_id' => $request->courseCategory,
            'price' => $request->coursePrice,
            'qty' => $request->courseQty,
            'start_date' => $request->courseStartDate,
            'duration' => $request->courseDuration
        ]);
        return redirect()->route('course#listPage')->with(['courseEdit' => 'Course Edited Successfully!']);
    }

    //course delete 
    public function delete ($id) {
        $image = Course::where('id', $id)->first();
        $image = $image->image;

        if ($image != null) {
            unlink(public_path('storage/'.$image));
        }
        Course::where('id' , $id)->delete();
        return redirect()->route('course#listPage');
    }

    //direct recommend course page
    public function recommendPage() {
        $course = Course::when(request('search'), function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->paginate(5)->withQueryString();
        return Inertia::render('Admin/Course/Recommend',[
            'course' => $course,
            'filters' => request('search'),
        ]);
    }

    //recommend course
    public function recommend($id , Request $request){
        if($request->value == 1) {
            Course::where('id' , $id)->update([
                'recommend' => true
            ]);
            return back();
        };
        
        if($request->value == 0){
            Course::where('id' , $id)->update([
                'recommend' => false
            ]);
            return back();
        }
    }


    // course validation check
    private function courseValidationCheck($request)
    {
        $validationRules = [
            'courseName' => 'required|min:3|unique:courses,name,' . $request->id,
            'courseDescription' => 'required|min:10',
            'courseCategory' => 'required',
            'coursePrice' => 'required',
            'courseQty' => 'required',
            'courseStartDate' => 'required',
            'courseDuration' => 'required',
        ];

        if ($request->hasFile('courseImage')) {
            $validationRules['courseImage'] = 'required|mimes:jpg,jpeg,png,webp|file';
        }

        Validator::make($request->all(), $validationRules)->validate();
    }
}
