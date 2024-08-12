<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoriesList(){

        $categories = Category::all();

        return view("admin.pages.categorieslist",compact("categories"));
        
    }

    public function CategoriesShow(){

        $categories = Category::where('cat_ust',0)->with('underCategory')->get();
        Categories();

        return view("admin.pages.categoriesadd",compact("categories"));

    }

    public function CategoriesCreate(AdminCategoryRequest $request){

        Category::create([
            "name"=> $request->name,
            "cat_ust"=> $request->category_id,
            "status" => $request->status,
        ]);

        return back()->withSuccess("Kategori Ekleme İşleminiz Başarılı Bir Şekilde Gerçekleşmiştir");

    }

    public function CategoriesEdit(Category $categoryy){
        $categories = Category::where("cat_ust", 0)->with('underCategory')->get();
        return view("admin.pages.categoriesedit",compact("categoryy","categories"));
    }

    public function CategoriesUpdate(AdminCategoryRequest $request , Category $categoryy){
        $categoryy->update($request->validated());
        return back()->withSuccess("Kategori Güncellem İşlemi Başarılı");
    }

    public function CategoriesDelete(Category $category){
        $category->delete();
        return back()->withSuccess("Kategori Silme Başarılı");
    }
}
