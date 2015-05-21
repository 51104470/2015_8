<?php namespace App\Http\Controllers;

use View;
use Input;
use File;
use Redirect;
use App\Review;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller {

	// public function index()
	// {
	// 	$products = Product::all();
	// 	return view('products.index', compact('products'));
	// }


	public function show(Product $product)
	{
		$product->view_number = $product->view_number + 1;
		$product->save();
		$reviews = $product->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(100);
		return view('products.show', compact('product', 'reviews'));
	}

}
