<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderProductTable extends Migration {

	public function up()
	{
		Schema::create('order_product', function($table)
    {
      $table->integer('order_id')->unsigned()->index();
      $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
      $table->integer('product_id')->unsigned()->index();
      $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
      $table->integer('number');
      $table->timestamps();
    });
	}	

	public function down()
	{
		Schema::drop('order_product');
	}

}
