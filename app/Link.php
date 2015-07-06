<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['title', 'url'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function votes()
    {
    	return $this->hasMany(Vote::class);
    }

    public function getVoteCountAttribute()
    {
    	return array_sum($this->votes->lists('value')->toArray());
    }
}
