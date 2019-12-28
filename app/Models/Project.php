<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use UniSharp\LaravelFilemanager\Traits\LfmHelpers;

class Project extends Model
{
    protected $guarded = [];
    
    protected $casts = [
    	'goals' => 'array'
    ];
    
    public function pages()
    {
    	return $this->morphedByMany(Page::class, 'projectable');
    }
    
    public function image_url($thumb = true)
    {
	    $full_file_path = $this->image; // get this from db
	    $img_thumb = explode('/', $full_file_path);
	
	    $thumbnail = '/photos/shares/thumbs/' . end($img_thumb);
	    $thumbnail_url = $this->image ? asset($thumbnail) : asset('placeholder-image.jpg');
	    $full_url = $this->image ? asset($this->image) : asset('placeholder-image.jpg');
    	return $thumb ? $thumbnail_url : $full_url;
    }
}
