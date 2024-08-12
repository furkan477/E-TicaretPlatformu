<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProductDetail(Product $product){

        return view("site.pages.product.productdetail",compact("product"));
    }
}
