<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Exceptions\Exception;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart_items = FacadesCart::instance('cart')->content();
        return view("cart", ["cart_items"=> $cart_items]);
    }

    public function addToCart(Request $request)
    {
        $product = Product::find($request->id);
        $price = $product->sale_price ? $product->sale_price : $product->regular_price;
        
        FacadesCart::instance('cart')->add($product->id,$product->name,$request->quantity,$price)->associate('App\Models\Product');
        
        return redirect()->back()->with('message','Success ! Item has been added successfully!');
    }  

    public function updateCart(Request $request)
    {
        FacadesCart::instance('cart')->update($request->rowId,$request->quantity);
        return redirect()->route('cart.index');
    }

    public function removeCart(Request $request)
    {
        $rowId = $request->rowId;
        FacadesCart::instance('cart')->remove($rowId);
        return redirect()->route('cart.index');
    }

    public function clearCart()
    {
        FacadesCart::instance('cart')->destroy();
        return redirect()->route('cart.index');
    }
}
