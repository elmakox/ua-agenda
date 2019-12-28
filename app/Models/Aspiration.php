<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspiration extends Model
{
	protected $guarded = [];
	
	protected $casts = [
		'goals' => 'array'
	];
	
	public function image_url()
	{
		$full_file_path = $this->image; // get this from db
		$img_thumb = explode('/', $full_file_path);
		
		$thumbnail = '/photos/shares/thumbs/' . end($img_thumb);
		
		return $this->image ? asset($thumbnail) : asset('placeholder-image.jpg');
	}
}
