<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function cart()
    {
    	// dd(session('cartItems'));
        return view('cart.index');
    }

    public function addToCart($id){

    	$product = Product::FindOrFail($id);
    	//Createing session with the name of cartItems 
    	$cartItems = session()->get('cartItems',[]);
    	if(isset($cartItems[$id])){
    		$cartItems[$id]['quantity']++;
    	}else{
    		//if not added to cart
    		$cartItems[$id] =[
    			'image_path'=> $product->image_path,
    			'name'=> $product->name,
    			'details'=> $product->details,
    			'price'=> $product->price,
    			'brand'=> $product->brand,
    			'quantity'=> 1
    		];
    	}
    	// passing data in sessions array of cartItems
    	session()->put('cartItems',$cartItems);
    	return redirect()->back()->with('sucess',"Product added Successfully");
    }

    public function delete(Request $request)
    {
    	$id = $request->id;
    	if ($id) {
    		$cartItems = session()->get('cartItems');
    		if (isset($cartItems[$id])) {
    			unset($cartItems[$id]);
    		// Passing remaining array after unset to session
    			session()->put('cartItems',$cartItems);
    		}
    		return redirect()->back()->with('sucess',"Product deleted Successfully");
    	}
    	
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cartItems = session()->get('cartItems');
            $cartItems[$request->id]["quantity"] = $request->quantity;
            session()->put('cartItems', $cartItems);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }
}
