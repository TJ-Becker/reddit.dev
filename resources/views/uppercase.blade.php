@extends('layouts.master')

@section('content')
    <h1>Your word: {!! $word !!}</h1>
    <h1>You word uppercased: {!! $wordToUpper !!}</h1>
@endsection
