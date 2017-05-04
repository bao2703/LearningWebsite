<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function lessons()
    {
    	return $this->belongsToMany('App\Lesson')
		    ->withPivot('user_progress')
		    ->withTimestamps();
    }

	public function tasks()
	{
		return $this->belongsToMany('App\Task')
			->withTimestamps();
	}

	public function scopeSearchBy($query, $searchString)
	{
		if ($searchString != '') {
			$query->where(function ($query) use ($searchString) {
				$query->where("name", "LIKE", "%$searchString%")
					->orWhere("email", "LIKE", "%$searchString%");
			});
		}
		return $query;
	}
}
