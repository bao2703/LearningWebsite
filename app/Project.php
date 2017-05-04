<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'title', 'sort_order'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
	];

	public function lessons()
	{
		return $this->hasMany('App\Lesson');
	}

	public function scopeSearchBy($query, $searchString)
	{
		if ($searchString != '') {
			$query->where(function ($query) use ($searchString) {
				$query->where("name", "LIKE", "%$searchString%")
					->orWhere("title", "LIKE", "%$searchString%");
			});
		}
		return $query;
	}
}
