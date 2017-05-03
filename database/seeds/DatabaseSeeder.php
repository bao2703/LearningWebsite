<?php

use App\Lesson;
use App\Project;
use App\Slide;
use App\Task;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$project_1 = Project::create([
			'name' => 'BUILD A PERSONAL WEBSITE',
			'title' => 'Your friend Anna wants you to make a website for her'
		]);

		$project_1->lessons()->saveMany([
			new Lesson([
				'name' => 'Make the headline and inputs'
			]),
			new Lesson([
				'name' => 'Style the background and text',
				'content' => '<h1>Anna Dowlin</h1>
<p>Hi! I\'m Anna, a NYC-based marketer. Say hello!</p>
<input type="email" placeholder="Your email">
<input type="submit">',
			]),
		]);

		for ($i = 1; $i <= 29; $i++) {
			Slide::create([
				'image' => 'storage/images/project-1/lesson-1/slide-' . $i . '.jpg',
				'sort_order' => $i,
				'lesson_id' => '1'
			]);
		}

		Task::create([
			'description' => 'Write this in the editor below: <h1>Anna Dowlin</h1>',
			'solution' => '<h1>Anna Dowlin</h1>',
			'slide_id' => 12
		]);

		Task::create([
			'description' => 'Write "Hi! I\'m Anna Dowlin, a NYC-based marketer. Say hello!" between an opening and a closing paragraph tag',
			'solution' => '<p>Hi! I\'m Anna Dowlin, a NYC-based marketer. Say hello!</p>',
			'slide_id' => 14
		]);

		Task::create([
			'description' => 'At the bottom, write <input type="email">',
			'solution' => '<input type="email">',
			'slide_id' => 19
		]);

		Task::create([
			'description' => 'Make another input with type="submit"',
			'solution' => '<input type="submit">',
			'slide_id' => 23
		]);

		Task::create([
			'description' => 'Add placeholder="Your email" to the email input. (If you need a hint, look at the previous slide)',
			'solution' => '<input type="email" placeholder="Your email">',
			'slide_id' => 27
		]);

		for ($i = 1; $i <= 43; $i++) {
			Slide::create([
				'image' => 'storage/images/project-1/lesson-2/slide-' . $i . '.jpg',
				'sort_order' => $i,
				'lesson_id' => '2'
			]);
		}

		Task::create([
			'description' => 'On the first line, before everything else, write: <style></style>',
			'solution' => '<style></style>',
			'slide_id' => 29 + 8
		]);

		/////////////////////////////
		User::create([
			'name' => 'Neptune',
			'email' => 'bao2703@gmail.com',
			'isAdmin' => true,
			'password' => bcrypt('1')
		]);

		User::create([
			'name' => 'Neptune2',
			'email' => 'bao2703@gmail.com2',
			'isAdmin' => false,
			'password' => bcrypt('1')
		]);
	}
}