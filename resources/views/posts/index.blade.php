


@extends ('layouts.master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="GET">
                <select name="searchBy">
                    <option value="title">Title</option>
                    <option value="url">URL</option>
                    <option value="content">Content</option>
                    <option value="created_by">Created By</option>
                </select>
                <input type="text" name="search">
                <button type="submit">Search</button>

            </form>
            <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                    <thead>
                        <th>Created At</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Content</th>
                        <th>Created By</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->url}}</td>
                                <td>{{$post->content}}</td>
                                <td>{{$post->user->name}}</td>
                                @if (Auth::id() == $post->created_by)
                                    <td><a href="{{action('PostsController@edit', $post->id)}}" data-value="{{$post->id}}" data-placement="top" data-toggle="tooltip" title="Edit">
                                            <button class="btn btn-primary btn-xs" data-title="Edit">
                                                <span class="glyphicon glyphicon-pencil"></span></button></a></td>
                                    <td><a data-placement="top" data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete">
                                                <span class="glyphicon glyphicon-trash"></span></button></a></td>
                                @else
                                    <td><a style="opacity:.2" data-placement="top" data-toggle="tooltip" title="Edit">
                                            <button class="btn btn-primary btn-xs" data-title="Edit">
                                                <span class="glyphicon glyphicon-pencil"></span></button></a></td>
                                    <td><a style="opacity:.2" data-placement="top" data-toggle="tooltip" title="Delete">
                                            <button class="btn btn-danger btn-xs" data-title="Delete">
                                                <span class="glyphicon glyphicon-trash"></span></button></a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="clearfix"></div>
                {!! $posts->render() !!}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input class="form-control " type="text" placeholder="Mohsin">
                </div>
                <div class="form-group">

                    <input class="form-control " type="text" placeholder="Irshad">
                </div>
                <div class="form-group">
                    <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
                </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
            </div>
            <div class="modal-footer ">
                <button id="yes" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                <a class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection


