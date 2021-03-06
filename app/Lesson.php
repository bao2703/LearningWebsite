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
		'name', 'content', 'sort_order'
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

	public function slides()
	{
		return $this->hasMany('App\Slide');
	}

	public function users()
	{
		return $this->belongsToMany('App\User')
			->withPivot('user_progress')
			->withTimestamps();
	}

	public function scopeSearchBy($query, $searchString)
	{
		if ($searchString != '') {
			$query->where(function ($query) use ($searchString) {
				$query->where("name", "LIKE", "%$searchString%");
			});
		}
		return $query;
	}
}
