<?php

use App\Lesson;
use App\Project;
use App\Slide;
use App\Task;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
				'content' =>'<h1>Hello</h1>',
			]),
		]);

		for ($i = 1; $i <= 29; $i++) {
			Slide::create([
				'image' => 'storage/images/project-1/lesson-1/slide-' . $i . '.jpg',
				'sort_order' => $i,
				'lesson_id' => '1'
			]);
		}

		for ($i = 1; $i <= 10; $i++) {
			Task::create([
				'description' => 'Task '.$i.' write this shit: <h1>Hello'.$i.'</h1>',
				'solution' => '<h1>Hello'.$i.'</h1>',
				'slide_id' => $i
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