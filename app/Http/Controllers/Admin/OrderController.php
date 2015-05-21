<?php namespace App\Http\Controllers\Admin;

use View;
use Input;
use File;
use Redirect;
use App\Order;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller {

	public function index()
  {
    $orders = Order::where('id', '>', '0')->orderBy('created_at', 'desc')->get();
    return view('admin.orders.index', compact('orders'));
  }

  public function store()
  {
    $input = Input::only('id');
    $order = Order::where('id', '=', $input)->firstOrFail();
    if (!is_null($order) && !$order->activated) {
      $order->activated = true;
      $order->save();
      return redirect()->back()->with('message', 'Thanh toán hóa đơn MT'.$order->id.' thành công');
    } else {
      return redirect()->back()->with('message', 'Đã có lỗi xảy ra.');
    }
  }
}
