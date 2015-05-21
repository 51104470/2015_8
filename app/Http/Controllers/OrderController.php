<?php namespace App\Http\Controllers;

use App\Product;
use App\Order;
use App\Profile;
use Session;
use Redirect;
use View;
use DB;
use Mail;
use App\Http\Requests;
use Input;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class OrderController extends Controller {

	protected $rules = [
		'name_person' => ['required', 'min:8'],
		'address' => ['required', 'min:10'],
		'numberphone' => ['required', 'min:10'],
		'email' => ['required', 'email']
	];

	protected function getProduct()
	{
		if (Session::has('cart'))
		{
		  $carts = Session::get('cart');
			$products = [];
			foreach ($carts as $value) {
				$product = Product::find($value);
				array_push($products, $product);
			}
		} else {
			$products = [];
		}
		$price_total = 0;
		$products_array = [];
		foreach ($products as $product) {
			$check = false;
			foreach ($products_array as $key => $value) {
				if ($products_array[$key]['id'] == $product->id) {
					$products_array[$key]['number'] = $products_array[$key]['number'] + 1;
					$products_array[$key]['price_total'] = $products_array[$key]['price_total'] + $product->price;
					$price_total = $price_total + $product->price;
					$check = true;
					break;
				}
			}
			if (!$check) {
				array_push($products_array, array("id" => $product->id, "name" => $product->name, "number" => 1, "price" => $product->price, "price_total" => $product->price));
				$price_total = $price_total + $product->price;
			}
		}
		
		return array($products_array, $price_total);
	}

	public function index()
	{
		$result = $this->getProduct();

		$products_array = $result[0];
		$price_total = $result[1];

		return view('orders.index', compact('products_array', 'price_total'));
	}

	public function create(Request $request)
	{
		$user = $request->user();
    $user_id = $user['attributes']['id'];
    $profile = Profile::where('user_id', '=', $user_id)->first();

		$result = $this->getProduct();
		$products_array = $result[0];
		$price_total = $result[1];


		return view('orders.create', compact('products_array', 'price_total', 'profile'));
	}

	public function store(Request $request)
	{
		$result = $this->getProduct();

		$products_array = $result[0];

		$this->validate($request, $this->rules);

		$input = Input::all();
		$order = Order::create($input);
		foreach ($products_array as $product_array) {
			$order->products()->attach($product_array['id']);
			DB::update('update order_product set number = '.$product_array['number'].' where order_id = '.$order->id.' and product_id = '.$product_array['id']);
			$product = Product::where('id', '=', $product_array['id'])->firstOrFail();
			$product->number = $product->number - 1;
			$product->save();
		}
		$order->save();

	  $contactName = Input::get('name_person');
    $contactEmail = Input::get('email');
    $contactAddess = Input::get('address');

    // Send email
    $data = array(
    	'name' => $contactName, 
    	'email' => $contactEmail,
    	'id_order' => $order->id,
    	'address' => $contactAddess
    );

    Mail::send('template.mail', $data, function($message) use ($contactEmail, $contactName)
    {   
      $message->from("vodanh0602@gmail.com", "Shop BKAN");
      $message->to($contactEmail, $contactName)->subject('Mail xác nhận mua hàng thành công');
    });
    Session::forget('cart');

    return view('orders.confirm_email');
	}

	public function addCart($value='')
	{
		$name_product = Product::where('id', '=', $value)->firstOrFail();
		if (Session::has('cart'))
		{
		  $carts = Session::get('cart');
		} else {
			$carts = [];
		}
		array_push($carts, $value);
		Session::put('cart', $carts);
		return redirect()->back()->with('message', 'Thêm sản phẩm '.$name_product->name.' thành công');
	}

	public function destroy() {
		Session::forget('cart');
		return redirect()->back()->with('message', 'Hủy giỏ hàng thành công');
	}

	public function show($id)
	{
		$order = Order::where('id', '=', $id)->firstOrFail();
		$product_list = $order->products;
		$number_list = DB::select('select number from order_product');

		return view('orders.show', compact('order', 'product_list', 'number_list'));
	}
}
