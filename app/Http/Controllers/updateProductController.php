<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class updateProductController extends Controller
{
    public function list(){
        $products=Product::all();
        return view('home', ['products'=>$products]);
    }

    public function edit($id){
        $product = Product::findorfail($id);
        return view('editproduct',['product' => $product] );
    }

    public function update(Request $request, $id){
        $oldImage = Product::findorfail($id);
        $product = [
            'title' => $request->title,
            'author' => $request->author,
            'description' => $request->description,
        ];


        $product['author'] = $request->get('author');
        $product['title'] = $request->get('title');
        $product['description'] = $request->get('description');

        Product::where('id',$id)->update($product);
        // $product->update($request->all());
        return redirect('home');
    }
}
