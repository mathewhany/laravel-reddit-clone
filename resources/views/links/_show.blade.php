<div class="row">
	<div class="col-lg-1">
		<div class="vote-count">{{ $link->voteCount }}</div>
	</div>
	<div class="col-lg-11">
		<div class="row">
			<div class="col-lg-7">
				<div class="title">
					<a href="{{ route('links.show', [$link->id]) }}">{{ $link->title }}</a>
					<div class="label label-success">{{ $link->url }}</div>
				</div>
			</div>
			<div class="col-lg-5">
				@include('links._control-buttons')
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="details">
					By
					<div class="user">{{ $link->user->name }}</div>
					about
					<div class="time">{{ $link->created_at->diffForHumans() }}</div>.
				</div>			
			</div>
		</div>
	</div>
</div>