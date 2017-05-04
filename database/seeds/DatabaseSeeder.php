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
			new Lesson([
				'name' => 'Add a background image and logo',
				'content' => '<!DOCTYPE html>
<head>
  <title>Anna Dowlin</title>
  <style>
    body {
      text-align: center;
      background: black;
      color: white;
      font-family: helvetica;
    }
  </style>
</head>
<body>
  <h1>Anna Dowlin</h1>
  <p>Hi! I\'m Anna, a NYC-based marketer. Say hello!</p>
  <input type="email" placeholder="Your email">
  <input type="submit">
</body>'
			]),
			new Lesson([
				'name' => 'Build your own personal website',
				'content' => '<!DOCTYPE html>
<head>
  <title>Anna Dowlin</title>
  <style>
    body {
      text-align: center;
      background: url("http://localhost:8000/storage/images/anna-bg.png");
      background-size: cover;
      background-position: center;
      color: white;
      font-family: helvetica;
    }
    p {
      font-size: 22px;
    }
    input {
      border: 0;
      padding: 10px;
      font-size: 18px;
    }
    input[type="submit"] {
      background: red;
      color: white;
    }
  </style>
</head>
<body>
  <img src="/storage/images/anna.png">
  <p>Hi! I\'m Anna, a NYC-based marketer. Say hello!</p>
  <input type="email" placeholder="Your email">
  <input type="submit">
</body>'
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

		Task::create([
			'description' => 'Make a new style that centers the text in the p tag',
			'solution' => '<style></style>',
			'slide_id' => 29 + 16
		]);

		Task::create([
			'description' => 'Wrap a <body> tag around the h1, p, and input elements',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 22
		]);

		Task::create([
			'description' => 'Make everything in the body centered by styling the body!',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 25
		]);

		Task::create([
			'description' => 'Wrap a <head> tag around your <style> tag',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 28
		]);

		Task::create([
			'description' => 'Write <!DOCTYPE html> on the first line, above everything else',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 32
		]);

		Task::create([
			'description' => 'Set the body\'s background to black',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 37
		]);

		Task::create([
			'description' => 'Change the color of the body\'s text to white',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 39
		]);

		Task::create([
			'description' => 'Change the body\'s font-family to helvetica',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 41
		]);

		for ($i = 1; $i <= 36; $i++) {
			Slide::create([
				'image' => 'storage/images/project-1/lesson-3/slide-' . $i . '.jpg',
				'sort_order' => $i,
				'lesson_id' => '3'
			]);
		}

		Task::create([
			'description' => 'Replace the <h1> tag with <img src="/storage/images/anna.png">',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 43 + 7
		]);

		Task::create([
			'description' => 'Change the background from "black" to url("http://localhost:8000/storage/images/anna-bg.png");',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 43 + 15
		]);

		Task::create([
			'description' => 'Set the background-size to cover',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 43 + 18
		]);

		Task::create([
			'description' => 'Set the body\'s background-position to center',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 43 + 20
		]);

		Task::create([
			'description' => 'Set the paragraph\'s font-size to 22px',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 43 + 24
		]);

		Task::create([
			'description' => 'Set the border of the inputs to 0',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 43 + 26
		]);

		Task::create([
			'description' => 'Set the input\'s font-size to 18px',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 43 + 30
		]);

		Task::create([
			'description' => 'Set the submit input\'s color to white',
			'solution' => 'TODO: make solution',
			'slide_id' => 29 + 43 + 34
		]);

		for ($i = 1; $i <= 7; $i++) {
			Slide::create([
				'image' => 'storage/images/project-1/lesson-4/slide-' . $i . '.jpg',
				'sort_order' => $i,
				'lesson_id' => '4'
			]);
		}

		$project_2 = Project::create([
			'name' => 'BUILD A RESPONSIVE BLOG THEME',
			'title' => 'Anna\'s friend Jeff needs a custom theme for his poetry blog'
		]);

		$project_2->lessons()->saveMany([
			new Lesson([
				'name' => 'Make the header and navigation HTML',
				'content' => ''
			]),
			new Lesson([
				'name' => 'Style the header with CSS',
				'content' => '<!DOCTYPE html>
<head>
</head>
<body>
  <header>
    <img src="/storage/images/jeff.png">
    <h1>Jeff\'s Blog</h1>
    <ul>
      <li><a href="#">About Me</a></li>
      <li><a href="#">Best Poems</a></li>
      <li><a href="#">Worst Poems</a></li>
    </ul>
  </header>
</body>'
			]),
			new Lesson([
				'name' => 'Add responsive design + "like" button',
				'content' => '<!DOCTYPE html>
<head>
  <link href="/normalize.css" rel="stylesheet">
  <style>
    header {
      text-align: center;
      background: url("http://localhost:8000/storage/images/jeff-bg.png");
      background-size: cover;
      color: white;
    }
    a {
      color: white;
    }
    h1 {
      font-size: 70px;
    }
    img {
      margin: 40px 0px 0px 0px;
      border: 7px solid white;
      border-radius: 20px;
    }
    ul {
      padding: 10px;
      background: black;
    }
    li {
      display: inline;
      padding: 0px 10px 0px 10px;
    }
  </style>
</head>
<body>
  <header>
    <img src="/assets/jeff.png">
    <h1>Jeff\'s Blog</h1>
    <ul>
      <li><a href="#">About Me</a></li>
      <li><a href="#">Best Poems</a></li>
      <li><a href="#">Worst Poems</a></li>
    </ul>
  </header>
  <h2>VHS umami pop-up trust fund</h2>
  <p>Marfa church-key kitsch bicycle rights, 8-bit mixtape cardigan gentrify Echo Park. Street art swag brunch, next level roof party Schlitz hella organic keffiyeh selfies. You probably haven\'t heard of them polaroid hashtag +1, meggings biodiesel Portland High Life cray tumblr retro.</p>
  <h2>Sartorial synth Echo Park, roof party</h2>
  <p>chambray you probably haven\'t heard of them pour-over viral selvage umami skateboard VHS post-ironic selfies. Wes Anderson gentrify fanny pack twee, bicycle rights bitters blog keffiyeh plaid flannel. Tonx irony cliche sustainable mlkshk bitters. Four loko leggings chambray Vice.</p>
  <h2>Forage food truck keytar master cleanse</h2>
  <p>ethical thundercats sustainable locavore quinoa Neutra. Aesthetic tacky sweater single-origin coffee, bicycle rights organic lo-fi street art american apparel ennui four loko ethnic Brooklyn small batch. Forage YOLO polaroid</p>
</body>
'
			]),
			new Lesson([
				'name' => 'Build your own blog theme',
				'content' => '<!DOCTYPE html>
<head>
  <link href="/normalize.css" rel="stylesheet">
  <style>
    header {
      text-align: center;
      background: url("http://localhost:8000/storage/images/jeff-bg.png");
      background-size: cover;
      color: white;
    }
    a {
      color: white;
    }
    h1 {
      font-size: 70px;
    }
    img {
      margin: 40px 0px 0px 0px;
      border: 7px solid white;
      border-radius: 20px;
    }
    ul {
      padding: 10px;
      background: rgba(0,0,0,0.5);
    }
    li {
      display: inline;
      padding: 0px 10px 0px 10px;
    }
    article {
      max-width: 500px;
      padding: 20px;
      margin: 0 auto;
    }
    @media (max-width: 500px) {
      h1 {
        font-size: 36px;
        padding: 5px;
      }
      li {
        padding: 5px;
        display: block;
      }
    }
  </style>
</head>
<body>
  <header>
    <img src="/assets/jeff.png">
    <h1>Jeff\'s Blog</h1>
    <ul>
      <li><a href="#">About Me</a></li>
      <li><a href="#">Best Poems</a></li>
      <li><a href="#">Worst Poems</a></li>
    </ul>
  </header>
  <article>
    <h2>VHS umami pop-up trust fund</h2>
    <p>Marfa church-key kitsch bicycle rights, 8-bit mixtape cardigan gentrify Echo Park. Street art swag brunch, next level roof party Schlitz hella organic keffiyeh selfies. You probably haven\'t heard of them polaroid hashtag +1, meggings biodiesel Portland High Life cray tumblr retro.</p>
    <button>Like</button>
  </article>
  <article>
    <h2>Sartorial synth Echo Park, roof party</h2>
    <p>chambray you probably haven\'t heard of them pour-over viral selvage umami skateboard VHS post-ironic selfies. Wes Anderson gentrify fanny pack twee, bicycle rights bitters blog keffiyeh plaid flannel. Tonx irony cliche sustainable mlkshk bitters. Four loko leggings chambray Vice.</p>
    <button>Like</button>
  </article>
  <article>
    <h2>Forage food truck keytar master cleanse</h2>
    <p>ethical thundercats sustainable locavore quinoa Neutra. Aesthetic tacky sweater single-origin coffee, bicycle rights organic lo-fi street art american apparel ennui four loko ethnic Brooklyn small batch. Forage YOLO polaroid</p>
    <button>Like</button>
  </article>
  <script>
    $("button").on("click", function() {
      alert("Clicked!");
    });
  </script>
</body>
'
			]),
		]);

		for ($i = 1; $i <= 28; $i++) {
			Slide::create([
				'image' => 'storage/images/project-2/lesson-1/slide-' . $i . '.jpg',
				'sort_order' => $i,
				'lesson_id' => 4 + 1
			]);
		}

		for ($i = 1; $i <= 43; $i++) {
			Slide::create([
				'image' => 'storage/images/project-2/lesson-2/slide-' . $i . '.jpg',
				'sort_order' => $i,
				'lesson_id' => 4 + 2
			]);
		}

		for ($i = 1; $i <= 6; $i++) {
			Slide::create([
				'image' => 'storage/images/project-2/lesson-3/slide-' . $i . '.jpg',
				'sort_order' => $i,
				'lesson_id' => 4 + 3
			]);
		}

		for ($i = 1; $i <= 43; $i++) {
			Slide::create([
				'image' => 'storage/images/project-2/lesson-4/slide-' . $i . '.jpg',
				'sort_order' => $i,
				'lesson_id' => 4 + 4
			]);
		}


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