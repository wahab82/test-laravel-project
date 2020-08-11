<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\OrderItem;
use App\Jobs\SendOrderNotification;
use App\Jobs\SendNotificationWarehouse;

class OrdersController extends Controller
{
	public function order($id)
	{
		if (!$this->validateCountry()) {
			return redirect('/')->with('error', 'Orders from your country are not allowed');
		}

		$product = Product::find($id);

		return view('product.order')->with('product', $product);
	}

	public function storeOrder(Request $request)
	{
		$this->validate($request, [
			'quantity' => 'required|integer',
			'email' => 'required|email',
			'shipping_address_1' => 'required',
			'shipping_address_2' => 'required',
			'shipping_address_3' => 'required',
			'city' => 'required',
			'country_code' => 'required',
			'zip_postal_code' => 'required',
		]);

		$order = new Order;
		$order->email = $request->input('email');
		$order->shipping_address_1 = $request->input('shipping_address_1');
		$order->shipping_address_2 = $request->input('shipping_address_2');
		$order->shipping_address_3 = $request->input('shipping_address_3');
		$order->city = $request->input('city');
		$order->country_code = $request->input('country_code');
		$order->zip_postal_code = $request->input('zip_postal_code');
		$order->save();

		// Add order item
		$order_item = new OrderItem;
		$order_item->product_id = $request->input('product_id');
		$order_item->order_id = $order->id;
		$order_item->quantity = $request->input('quantity');
		$order_item->save();

		$product = Product::find($order_item->product_id);
		
		dispatch(new SendOrderNotification($order, $product));
		dispatch(new SendNotificationWarehouse($order, $product));

		return redirect('/')->with('success', 'Order dispatched successfully.');
	}

	public function validateCountry() {
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://freegeoip.app/json/",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"accept: application/json",
				"content-type: application/json"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		$response = json_decode($response);

		if ($response && $response->country_code == 'SO') {
			return false;
		}

		return true;
	}
}
