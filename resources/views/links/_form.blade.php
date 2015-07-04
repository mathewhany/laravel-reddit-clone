<div class="form-group">
	{!! Form::label('title', 'Title') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('url', 'URL') !!}
	{!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>