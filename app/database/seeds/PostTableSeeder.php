<?php

class PostTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('post')->truncate();

		$post = array([
            'title' => 'First post',
            'user_id' => 1,
            'rawContent' => '**Lorem Ipsum** is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. *It has survived not only five centuries*, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'excerpt' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'status' => 'publish',
            'slug' => 'first-post',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],
        [
            'title' => 'Second post',
            'user_id' => 1,
            'rawContent' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
            'excerpt' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'status' => 'publish',
            'slug' => 'second-post',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

		// Uncomment the below to run the seeder
		DB::table('posts')->insert($post);
	}

}
