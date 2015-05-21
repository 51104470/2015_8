<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name_person');
			$table->string('address');
			$table->string('numberphone');
			$table->string('email');
			$table->integer('total_price');
			$table->text('note');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}

}
