<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Order;

class OrderTest extends TestCase
{
	use RefreshDatabase;

	public function test_order_can_submited_through_form()
	{
		$response = $this->post('orders/storeOrder', [
			'quantity' => '3',
			'email' => 'email@test.com',
			'shipping_address_1' => 'address1',
			'shipping_address_2' => 'address2',
			'shipping_address_3' => 'address3',
			'city' => 'Islamabad',
			'country_code' => 'PK',
			'zip_postal_code' => '44000',
			'product_id' => '2',
		]);

		$this->assertCount(1, Order::all());
	}
}
