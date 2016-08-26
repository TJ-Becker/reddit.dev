@extends ('layouts.master')

@section('content')


    <div class="container">
        <div class="row">
            <form method="POST" action="{{action('PostsController@update', $post->id)}}" role="form" id="contact-form" class="contact-form">
                {{ method_field('PUT') }}
                {!! csrf_field() !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input value="{{old('title') ? : $post->title}}" type="text" class="form-control" name="title" autocomplete="off" id="Name">
                            {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input value="{{old('url') ? : $post->url}}" type="text" class="form-control" name="url" autocomplete="off" placeholder="URL">
                            {!! $errors->first('content', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control textarea" rows="3" name="content" id="Message" placeholder="Content">{{old('content') ? : $post->content}}</textarea>
                            {!! $errors->first('url', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" class="btn main-btn pull-right"></input>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection
