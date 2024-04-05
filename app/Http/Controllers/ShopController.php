<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::orderBy("id", "desc")->paginate(9);
        return view("shop", ["products" => $products]);
    }

    public function showProductDetails($slug)
    {
        $product = Product::where("slug", $slug)->firstOrFail();
        $related_products_list = Product::where('slug', '!=', $slug)->inRandomOrder('id')->get()->take(4);
        return view("details", ["product" => $product, "related_products_list" => $related_products_list]);
    }
}
