@extends ('layouts.master')

@section('content')
    @foreach($posts as $post)
        <dl>
            <dt>Title</dt>
                <dd>{!! $post->created_at->format('l, F jS Y @ h:i:s A') !!}</dd>
                <dd>{{$post->title}}</dd>
            <dt>URL</dt>
                <dd>{{$post->url}}</dd>
            <dt>Content</dt>
                <dd>{{$post->content}}</dd>
            <dt>Created by</dt>
                <dd>{{$post->created_by}}</dd>
            <dt>
                <form action="{{action('PostsController@destroy', $post->id)}}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="submit" value="Delete">
                </form>
            </dt>
            <dt>
                <a href="{{action('PostsController@edit', $post->id)}}">Edit</a>
            </dt>
        </dl>

    @endforeach
    {!! $posts->render() !!}
@endsection