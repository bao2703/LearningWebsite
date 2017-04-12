<?php

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
		factory(App\Project::class, 5)->create()
			->each(function ($p) {
				$p->lessons()->saveMany(factory(App\Lesson::class, 4)->make());
			});;
	}
}