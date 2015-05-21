<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnViewNumberForProductsTable extends Migration {

	public function up()
	{
		Schema::table('products', function($table)
		{
	    $table->integer('view_number');
		});
	}

	public function down()
	{
		Schema::table('products', function($table)
		{
	    $table->dropColumn('view_number');
		});
	}

}
