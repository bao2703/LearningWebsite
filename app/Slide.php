<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'image', 'sort_order'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
	];

	public function lesson()
	{
		return $this->belongsTo('App\Lesson');
	}

	public function task()
	{
		return $this->hasOne('App\Task');
	}
}
