<?php

namespace Application\Models;

use Application\Core\Model;

class File extends Model
{
	protected $table = "files";
	protected $fillable = ["name"];
}
