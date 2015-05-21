<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnRatingCacheAndRatingCountForProductTable extends Migration {

	public function up()
	{
		Schema::table('products', function($table)
		{
	    $table->float('rating_cache')->default(3.0);
	    $table->integer('rating_count')->default(0);
		});
	}


	public function down()
	{
		Schema::table('products', function($table)
		{
	    $table->dropColumn('rating_cache');
	    $table->dropColumn('rating_count');
		});
	}

}
