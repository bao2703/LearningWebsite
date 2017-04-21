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
				'name' => 'Style the background and text'
			]),
		]);

		for ($i = 1; $i <= 29; $i++) {
			Slide::create([
				'image' => 'assets/images/project-1/lesson-1/slide-'.$i.'.jpg',
				'sort_order' => $i,
				'lesson_id' => '1'
			]);
		}

		Task::create([
			'description' => 'CHECKPOINT 1',
			'solution' => '<h1>Hello</h1>',
			'slide_id' => '1'
		]);

		User::create([
			'name' => 'Neptune',
			'email' => 'bao2703@gmail.com',
			'password' => Hash::make('bao2703@gmail.com')
		]);
	}
}