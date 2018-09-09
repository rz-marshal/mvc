<?php

namespace Application\Models;

use \Illuminate\Database\Eloquent\Model;

class User extends Model
{
	protected $table = "users";
	protected $fillable = ["name", "age", "description", "login", "password", "id_file"];


	public function files() {
		return $this->hasMany("Application\Models\File", "id_file");

	}
}
