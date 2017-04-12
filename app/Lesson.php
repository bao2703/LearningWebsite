<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'title',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
	];

	public function project()
	{
		return $this->belongsTo('App\Project');
	}
}