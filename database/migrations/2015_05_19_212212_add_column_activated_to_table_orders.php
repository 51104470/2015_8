<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnActivatedToTableOrders extends Migration {

	public function up()
	{
		Schema::table('orders', function($table)
		{
	    	$table->boolean('activated')->default(false);
		});
	}


	public function down()
	{
		Schema::table('orders', function($table)
		{
	    	$table->dropColumn('activated');
		});
	}

}
