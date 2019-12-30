<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];
	
	protected $casts = [
		'date' => 'date',
		'is_resource' => 'boolean',
		'medias' => 'array'
	];
	
	public function projects()
	{
		return $this->morphToMany(Project::class, 'projectable');
	}
	
	public function aspirations()
	{
		return $this->morphToMany(Aspiration::class, 'aspirationnable');
	}
}
