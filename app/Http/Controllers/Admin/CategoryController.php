<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //CREATE CATEGORY 
    public function createCategory()
    {
        $categoryData = Category::with('subCategory')->get();
        return view('admin.category.addcategory', compact('categoryData'));
    }


    // STORE CATEGORY AND UPDATE CATEGORY 
    public function categoryStoreOrUpdate(Request $request, $id = null)
    {
        $request->validate([
            'category' => 'required|unique:categories,title',
        ]);


        if ($request->category_id) {
            $insertUpdateCategory = new Subcategory();
            $insertUpdateCategory->category_id = $request->category_id;
        } else {
            $insertUpdateCategory = new Category();
        }
        $insertUpdateCategory->title = $request->category;
        $insertUpdateCategory->save();
        return back();
    }


    // SUB CATEGORY CREATE
    public function createSubCategory()
    {
        $allCategory = Category::all();
        $allSubCategory = Subcategory::all();
        return view('admin.category.subcategory', compact('allCategory', 'allSubCategory'));
    }


    // AJAX
    public function test(Request $request)
    {
        $categoryId = $request->ctegoryId;
        $subCategory = Subcategory::where('category_id', $categoryId)->get();
        return $subCategory;
    }
}
