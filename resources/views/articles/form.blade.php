
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
    {!! Form::input('date','published_at', $article->published_at, array('class' => 'form-control')) !!}
    <small class="text-danger">{{ $errors->first('published_at') }}</small>
</div>

<!--- tags Field --->
<div class="form-group">
    {!! Form::label('tag_list', 'Tags:') !!}
    {!! Form::select('tag_list[]', $tags, null,  ['id' => 'tag_lists', 'class' => 'form-control', ' multiple']) !!}

</div>

<div class="form-group">
    {!! Form::submit($submitButton, array('class' => 'btn btn-primary form-control')) !!}
</div>


@section('footer')
    <script>
        $('#tag_lists').select2({
            placeholder: 'Choose a tag'
        });
    </script>
@endsection