<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Intervention\Image\Facades\Image;
use App\Http\Requests\AdminProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList(){

        $products = Product::with('category')->get();

        return view("admin.pages.productlist",compact("products"));

    }
    
    public function productShow(){

        $categories = Category::where('cat_ust',0)->with('underCategory')->get();
        Categories();

        return view("admin.pages.productadd",compact("categories"));

    }

    public function productCreate(AdminProductRequest $request){

        try {
            $image = $request->file('image');
            $imageName = time().'.'.$image->extension();
            $image->storeAs('public', $imageName);
        }catch(\Exception $e){
            report($e);
            return back()->with('error','Resim dosyası yüklenirken beklenmedik bir hata oluştu. Hata mesajı: ' . $e->getMessage());
        }
    

        Product::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'category_id'=> $request->category_id,
            'image_url'=> $imageName ?? null,
            'status'=> $request->status,
        ]);

        return back()->withSuccess("Ürün Ekleme İşlemi Başarılı Bir Şekilde Gerçekleşmiştir.");
    }

    public function ProductDelete(Product $product){
        $product->delete();
        Comment::where("product_id", $product->id)->delete();

        return back()->withSuccess("Silme İşlemi Başarılı");
    }


    public function productEdit(Product $product){
        $categories = Category::where("cat_ust",0)->with("underCategory")->get();
        return view("admin.pages.productedit",compact("product","categories"));
    }  

    public function productUpdate(AdminProductRequest $request,Product $product){
        try {
            $image = $request->file('image');
            $image_name = time().'.'.$image->extension();
            $image_path = $image->storeAs('public',$image_name);
        } catch(\Exception $e){
            report($e);
            return back()->with('error','Hata Bulundu'. $e->getMessage());
        }

        $product->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'price'=> $request->price,
            'category_id'=> $request->category_id,
            'image_url'=> $image_name ?? null,
            'status'=> $request->status,
        ]);

        return back()->withSuccess('Güncelleme İşlemi Başarılı.');
    }


    public function productDetail(Product $product){
        return view('admin.pages.productdetail',compact('product'));
    }
}
