<!-- Temporary -->
{!! Form::hidden('user_id', 1)!!}

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
    {!! Form::submit($submitButton, array('class' => 'btn btn-primary form-control')) !!}
</div>
