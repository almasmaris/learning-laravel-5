@extends('app')	


@section('content')
	

	<h1>Write a new article</h1>
	<hr/>


	{!! Form::open(['url' => 'articles']) !!}
	<div class="form-group">
		{!! Form::label('title', 'Title:') !!}
		{!! Form::text('title', null, ['class' => 'form-control']) !!}
		<small class="text-danger">{{ $errors->first('title') }}</small>
	</div>
	
	<div class="form-group">
	    {!! Form::label('body', 'Body:') !!}
	    {!! Form::textarea('body', null, array('class' => 'form-control')) !!}
	    <small class="text-danger">{{ $errors->first('body') }}</small>
	</div>

	<div class="form-group">
	    {!! Form::label('published_at', 'Published_on') !!}
	    {!! Form::input('date','published_at', date('Y-m-d'), array('class' => 'form-control')) !!}
	    <small class="text-danger">{{ $errors->first('published_at') }}</small>
	</div>


	<div class="form-group">
		{!! Form::submit('Add article', array('class' => 'btn btn-primary form-control')) !!}
	</div>


	{!! Form::close() !!}


	@if ($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

@stop