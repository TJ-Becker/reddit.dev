@extends ('layouts.master')

@section ('content')
    <h1>Title</h1>{{ $post->title }}
    <h1>URL</h1>{{ $post->url }}
    <h1>Content</h1>{{$post->content}}
    <h1>Created by</h1>{{$post->created_by}}
@endsection