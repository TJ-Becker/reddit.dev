<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Reddit</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        @if (Auth::check())
            <div>
                <a href="{{action('PostsController@index')}}">Home</a>
                <a href="{{action('PostsController@create')}}">Create New Post</a>
                <a href="{{action('Auth\AuthController@getLogout')}}">Logout</a>
            </div>
        @endif
        @yield('content')
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script>
    </body>
</html>