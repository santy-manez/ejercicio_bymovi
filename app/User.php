<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
	use SoftDeletes;

	public function role()
	{
	 	return $this->belongsTo(Role::class);
	}
}
