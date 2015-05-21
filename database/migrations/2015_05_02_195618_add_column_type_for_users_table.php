<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTypeForUsersTable extends Migration {

	public function up()
	{
		Schema::table('users', function($table)
		{
	    $table->char('type', 1)->default('G');
		});
	}

	public function down()
	{
		Schema::table('users', function($table)
		{
	    $table->dropColumn('type');
		});
	}

}
