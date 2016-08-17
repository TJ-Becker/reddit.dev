@extends ('layouts.master')

@section ('content')
    <h1>{!! $number !!}</h1>
    <a href="{{action('HomeController@increment', $number)}}">increment</a>
    <a href="{{action('HomeController@increment', ($number - 2))}}">decrement</a>
@stop