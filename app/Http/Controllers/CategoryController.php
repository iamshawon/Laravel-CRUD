<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Category;

class CategoryController extends Controller
{
    public function allCategory(){
        $allcategory = Category::latest()->paginate(6);

        //Trash
        $trashcategory = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin/category/index', compact('allcategory', 'trashcategory'));
    }

    public function addCategory(Request $request){
        $request->validate([
            'category_name' => 'required|max:25',
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category Name Less than 25 Characters'
        ]);

        // Insert Category
        $insertcategory = Category::Insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::User()->id,
            'created_at' => Carbon::now(),
        ]); 

        return Redirect()->back()->with('success', 'New Category Inserted!');
    }

    public function editCategory($id){
        $editcategory = Category::find($id);
        return view('admin/category/edit_category', compact('editcategory'));
    }

    // Update Category
    public function updateCategory(Request $request, $id){
        $updatecategory = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::User()->id,
        ]);
        return Redirect()->route('all.category')->with('success', 'Category Updated!');
    }

    // Delete Category
    public function deleteCategory($id){
        $deletecategory = Category::find($id)->delete();
        return Redirect()->back()->with('success', 'Category Deleted!');
    }

    // Restore Category
    public function restoreCategory($id){
        $restorecategory = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Category Restored!');
    }

    // Parmanently Delete Category
    public function forceDeleteCategory($id){
        $forcedeletecategory = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Category Parmanently Deleted!');
    }
}
