<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class CategoryController extends Controller
{
    //direct list page
    public function listPage()
    {
        $category = Category::when(request('search'), function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })->orderBy('created_at' , 'desc')->paginate(5)->withQueryString();
        return Inertia::render('Admin/Category/List', [
            'category' => $category,
            'filters' => request('search'),
        ]);
    }

    //category create page
    public function createPage()
    {
        return Inertia::render('Admin/Category/Create');
    }

    //category create
    public function create(Request $request)
    {
        $this->checkValidationCreate($request);
        Category::create([
            'name' => $request->category,
        ]);
        Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
        return redirect()->route('category#listPage')->with(['categoryCreate' => 'Category Created Successfully!']);
    }

    //category edit page
    public function editPage($id)
    {
        $dataEdit = Category::where('id', $id)->get();
        return Inertia::render('Admin/Category/Edit', [
            'category' => $dataEdit,
        ]);
    }

    //category edit
    public function edit(Request $request, $id)
    {
        $this->checkValidationCreate($request);
        Category::where('id', $id)->update([
            'name' => $request->category,
        ]);
        return redirect()->route('category#listPage')->with(['categoryEdit' => 'Category Edited Successfully!']);
    }

    //category delete
    public function delete($id)
    {
        Category::where('id', $id)->delete();
        return back();
    }

    private function checkValidationCreate($request)
    {
        Validator::make($request->all(), [
            'category' => 'required|min:3|unique:categories,name,' . $request->id,
        ])->validate();
    }
}
