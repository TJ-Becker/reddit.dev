@extends ('layouts.master')

@section('content')
    <form method="POST" action="{{action('PostsController@update', $post->id)}}">
        {{ method_field('PUT') }}
        {!! csrf_field() !!}
        Title: <input type="text" name="title" value="{{old('title')}}">
        {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
        Content: <input type="text" name="content" value="{{old('content')}}">
        {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
        URL: <input type="text" name="url" value="{{old('url')}}">
        {!! $errors->first('url', '<span class="help-block">:message</span>') !!}

        <input type="submit">
    </form>
@endsection