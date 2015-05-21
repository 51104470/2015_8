<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexSearchNameAndDescriptionToTableProducts extends Migration {

	public function up()
	{
		DB::statement('ALTER TABLE products ADD FULLTEXT search(name, description)');
	}

	public function down()
	{
		Schema::table('products', function($table) {
            $table->dropIndex('search');
        });
	}

}
