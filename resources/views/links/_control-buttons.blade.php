@if (Auth::check())
	<div class="control-buttons">
		@if (Auth::user()->own($link))
			{!! link_to_route('links.edit', 'Edit', [$link->id], ['class' => 'btn btn-primary']) !!}
			{!! Form::open(['route' => ['links.destroy', $link->id], 'method' => 'delete']) !!}
				{!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
			{!! Form::close() !!}
		@else
			@if ($value = Auth::user()->getVotingValue($link))
				<label>
					You had voted	
					@if ($value === 1)
						up
					@elseif ($value === -1)
						down
					@endif
					...
				</label>
				{!! link_to_action(
					'VoteController@undoVote', 
					'Undo vote?', 
					[$link->id], 
					['class' => 'btn btn-danger']
				) !!}
			@else
				<div class="btn-group">
					{!! link_to_action(
						'VoteController@voteUp', 
						'Vote up', 
						[$link->id], 
						['class' => 'btn btn-default']
					) !!}
					{!! link_to_action(
						'VoteController@voteDown', 
						'Vote down', 
						[$link->id], 
						['class' => 'btn btn-default']
					) !!}
				</div>
			@endif
		@endif
		{!! link_to($link->url, 'Go to this link', ['class' => 'btn btn-primary']) !!}
	</div>
@endif