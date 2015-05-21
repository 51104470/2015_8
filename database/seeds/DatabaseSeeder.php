<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('UsersTableSeeder');
	}

}

class UsersTableSeeder extends Seeder {

  public function run()
  {
      DB::table('users')->delete();

      $users = array(
          ['id' => 1, 'name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => '$2y$10$KUYj39Trh9tsZu2FkoYDrOXAQBpUG9/Mo1L0XkL/EHjGoOiQwKSbS', 'type' => "A", 'created_at' => new DateTime, 'updated_at' => new DateTime],
          ['id' => 2, 'name' => 'Nguyen Ngoc Minh Tuan', 'email' => 'minhtuan0602@gmail.com', 'password' => '$2y$10$KUYj39Trh9tsZu2FkoYDrOXAQBpUG9/Mo1L0XkL/EHjGoOiQwKSbS', 'type' => "G", 'created_at' => new DateTime, 'updated_at' => new DateTime]
      );

      DB::table('users')->insert($users);
  }
  
}
