<?php namespace App\Http\Controllers\Admin;

use View;
use Input;
use File;
use Redirect;
use App\Product;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller {

	// Transform array to convert english
	protected $trans = array(
		'à' => "a", 'á' => "a", 'ạ' => "a", 'ả' => "a", 'ã' => "a", 'â' => "a", 'ầ' => "a", 'ấ' => "a", 'ậ' => "a", 'ẩ' => "a", 'ẫ' => "a", 'ă' => "a", 'ắ' => "a", 'ặ' => "a", 'ẳ' => "a", 'ẵ' => "a",
		'è' => "e", 'é' => "e", 'ẹ' => "e", 'ẻ' => "e", 'ẽ' => "e", 'ê' => "e", 'ề' => "e", 'ế' => "e", 'ệ' => "e", 'ể' => "e", 'ễ' => "e",
		'ì' => "i", 'í' => "i", 'ị' => "i", 'ỉ' => "i", 'ĩ' => "i",
		'ò' => "o", 'ó' => "o", 'ọ' => "o", 'ỏ' => "o", 'õ' => "o", 'ô' => "o", 'ồ' => "o", 'ố' => "o", 'ộ' => "o", 'ổ' => "o", 'ỗ' => "o", 'ơ' => "o", 'ờ' => "o", 'ớ' => "o", 'ợ' => "o", 'ở' => "o", 'ỡ' => "o",
		'ù' => "u", 'ú' => "u", 'ụ' => "u", 'ủ' => "u", 'ũ' => "u", 'ư' => "u", 'ừ' => "u", 'ứ' => "u", 'ự' => "u", 'ử' => "u", 'ữ' => "u",
		'ỳ' => "y", 'ý' => "y", 'ỵ' => "y", 'ỷ' => "y", 'ỹ' => "y",
		'À' => "a", 'Á' => "a", 'Ạ' => "a", 'Ả' => "a", 'Ã' => "a", 'Â' => "a", 'Ầ' => "a", 'Ầ' => "a", 'Ậ' => "a", 'Ẩ' => "a", 'Ẫ' => "a", 'Ă' => "a", 'Ẳ' => "a", 'Ặ' => "a", 'Ẳ' => "a", 'Ẵ' => "a",
		'È' => "e", 'É' => "e", 'Ẹ' => "e", 'Ẻ' => "e", 'Ẽ' => "e", 'Ê' => "e", 'Ề' => "e", 'Ế' => "e", 'Ệ' => "e", 'Ể' => "e", 'Ễ' => "e",
		'Ì' => "i", 'Í' => "i", 'Ị' => "i", 'Ỉ' => "i", 'Ĩ' => "i",
		'Ò' => "o", 'Ó' => "o", 'Ọ' => "o", 'Ỏ' => "o", 'Õ' => "o", 'Ô' => "o", 'Ồ' => "o", 'Ố' => "o", 'Ộ' => "o", 'Ổ' => "o", 'Ỗ' => "o", 'Ơ' => "o", 'Ờ' => "o", 'Ớ' => "o", 'Ợ' => "o", 'Ở' => "o", 'Ỡ' => "o",
		'Ù' => "u", 'Ú' => "u", 'Ụ' => "u", 'Ủ' => "u", 'Ũ' => "u", 'Ư' => "u", 'Ừ' => "u", 'Ứ' => "u", 'Ự' => "u", 'Ử' => "u", 'Ữ' => "u",
		'Ỳ' => "y", 'Ý' => "y", 'Ỵ' => "y", 'Ỷ' => "y", 'Ỹ' => "y",
		'đ' => "d", 'Đ' => "d",
		'!' => "-", '@' => "-", '%' => "-", '^' => "-", '*' => "-", '(' => "-", ')' => "-", '+' => "-", '=' => "-", '<' => "-", '>' => "-", '?' => "-", '/' => "-", '.' => "-", ':' => "-", ';' => "-", "'" => "-", '"' => "-", '&' => "-", '#' => "-", '[' => "-", ']' => "-", '~' => "-", '$' => "-", ' ' => "-"
	);

	protected $rules = [
		'name' => ['required', 'min:3'],
		'price' => ['required'],
		'number' => ['required']
	];

	public function index()
	{
		$products = Product::all();
		return view('admin.products.index', compact('products'));
	}

	public function create()
	{
		return view('admin.products.create');
	}

	public function store(Request $request)
	{
		$this->validate($request, $this->rules);

		$input = array_except(Input::all(), ['image', 'animal']);
		$product = Product::create($input);

		// Create slug automation
		$name = Input::get('name');
		$slug = strtolower(strtr($name, $this->trans));
		$product_slug = Product::where('slug', 'like', $slug)->first();
		if (!is_null($product_slug)) {
			$product->delete();
			return Redirect::route('admin.products.index')->with('message', 'Sản phẩm đã tồn tại');
		}
		$product->slug = $slug;

		$image = Input::file('image');
		if (!is_null($image)) {
			$filename = time()."-".$image->getClientOriginalName();
			$destinationPath = public_path().'/image/products/';
   		$uploadSuccess = $image->move($destinationPath, $filename);
			$product->image = '/image/products/'.$filename;
		}
		$product->save();

		return Redirect::route('admin.products.index')->with('message', 'Tạo sản phẩm thành công');

	}

	public function show(Product $product)
	{
		return view('admin.products.show', compact('product'));
	}

	public function edit(Product $product)
	{
		return view('admin.products.edit', compact('product'));
	}

	public function update(Product $product, Request $request)
	{
		$this->validate($request, $this->rules);

		$input = array_except(Input::all(), ['image', 'animal', '_method']);
		$product->update($input);

		$image = Input::file('image');
		if (!is_null($image)) {
			$filename = time()."-".$image->getClientOriginalName();
			$destinationPath = public_path().'/image/products/';
   		$uploadSuccess = $image->move($destinationPath, $filename);
			$product->image = '/image/products/'.$filename;
		}

		$product->save();

		return Redirect::route('admin.products.show', $product->slug)->with('message', 'Chỉnh sửa sản phẩm thành công');

	}

	public function destroy(Product $product)
	{
		$product->delete();

		return Redirect::route('admin.products.index')->with('message', 'Xóa sản phẩm thành công');
	}

}
