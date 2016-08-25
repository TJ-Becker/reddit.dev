@extends ('layouts.master')

@section ('content')
    <h1>Login</h1>
    <form method="POST" action="{{action('Auth\AuthController@postLogin')}}">
        {!! csrf_field() !!}
        Email: <input type="text" name="email">
        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
        Password: <input type="text" name="password">
        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
        <input type="submit">
    </form>

    {{--method="POST" action="{{action('PostsController@update', $post->id)}}"--}}
    {{--{{ method_field('PUT') }}--}}
    {{--{!! csrf_field() !!}--}}
    {{--{!! $errors->first('title', '<span class="help-block">:message</span>') !!}--}}
    {{--{!! $errors->first('content', '<span class="help-block">:message</span>') !!}--}}
    {{--value="{{old('title')}}"--}}
    {{--value="{{old('content')}}"--}}
@stop