<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index(){
        return view('insertproduct');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'author' => 'required',
            'title' => 'required|min:5|max:25',
            'description' => 'required|min:10|max:100',


        ]);

        $author = $request['author'];
        $title = $request['title'];
        $description = $request['description'];


        $product = new Product();
        $product->author = $author;
        $product->title = $title;
        $product->description = $description;



        $product-> save();
        return Redirect::to('/home');

  }


    public function addtocart(Request $request){

            $cart = new Cart;
            $cart->product_title=$request->product_title;
            $cart->save();
            return redirect('home');

    }

    public function cartlist(){
        $carts=Cart::all();
        return view('cart', ['carts'=>$carts]);
    }

    function deletecart($id){
        $items=Cart::find($id);
        $items->delete();
        return redirect('cart');
    }
}
