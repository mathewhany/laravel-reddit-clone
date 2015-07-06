<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['link_id', 'user_id', 'value'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function link()
    {
    	return $this->belongsTo(Link::class);
    }
}
