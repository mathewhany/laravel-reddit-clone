<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function links()
    {
        return $this->hasMany(Link::class);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function own(Link $link)
    {
        return $link->user_id == $this->id;
    }

    public function getVotingValue(Link $link)
    {
        $vote = Vote::where('user_id', $this->id)->where('link_id', $link->id)->first();

        return $vote ? $vote->value : false;
    }

    public function hasVotedFor(Link $link)
    {
        return $this->getVotingValue($link) === 1; 
    }

    public function hasVotedAgainst(Link $link)
    {
        return $this->getVotingValue($link) === -1; 
    }
}
