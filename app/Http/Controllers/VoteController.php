<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vote;
use App\Link;

use Auth;

class VoteController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
        $this->middleware('revoting', ['except' => 'undoVote']);
        $this->middleware('owner', ['except' => 'undoVote']);
	}

    public function voteUp(Link $link)
    {
        flash()->success('You\'ve successfully voted for this link.');

    	return $this->vote($link, 1);
    }

    public function voteDown(Link $link)
    {
        flash()->success('You\'ve successfully voted against this link.');
        
    	return $this->vote($link, -1);
    }

    public function undoVote(Link $link)
    {
        flash()->success('Undoing ... DONE!');
        
        Vote::where('user_id', Auth::id())->where('link_id', $link->id)->delete();

        return redirect()->route('home');
    }

    protected function vote(Link $link, $value)
    {
    	Vote::create([
    		'link_id' => $link->id,
    		'user_id' => Auth::id(),
    		'value' => $value
		]);

        return redirect()->route('home');
    }
}
