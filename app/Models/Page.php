<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];
	
//    protected $with = ['projects', 'aspirations'];
	protected $casts = [
		'media' => 'array',
		'additional_links' => 'array',
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
