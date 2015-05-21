<?php namespace App\Http\Controllers;

use View;
use Input;
use File;
use Redirect;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class HomeController extends Controller {

	public function index()
	{
		$new_products = Product::where('id', '>', 0)->orderBy('created_at', 'desc')->paginate(12);
		$view_products = Product::where('id', '>', 0)->orderBy('view_number', 'desc')->paginate(12);
		$rate_products = Product::where('id', '>', 0)->orderBy('rating_cache', 'desc')->paginate(12);
		return view('home', compact('new_products', 'rate_products', 'view_products'));
	}

}
