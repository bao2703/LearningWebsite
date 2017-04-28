<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'description', 'solution', 'slide_id'
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
		return $this->belongsTo('App\Slide');
	}

	public function users()
	{
		return $this->belongsToMany('App\User')
			->withTimestamps();
	}
}
