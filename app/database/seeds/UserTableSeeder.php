<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('user')->truncate();

		$user = array([
            'login' => 'test',
            'password' => Hash::make('123456'),
            'name' => 'User',
            'surname' => 'Test'
        ]
		);

		// Uncomment the below to run the seeder
		DB::table('users')->insert($user);
	}

}
