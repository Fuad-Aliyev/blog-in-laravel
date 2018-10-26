<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - Blog</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    @yield('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3">
                <br>
                <br>
                <br>
                <ul id="side-menu" class="nav nav-pills nav-stacked">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button">
                                        <i class="fa fa-search">Seach</i>
                                    </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <br>
                    <li><a href="{{ action('AdminUsersController@index') }}">
                        <span class="glyphicon glyphicon-user ac"></span> &nbsp;Users</a>
                    </li>
                    <li><a href="{{ action('AdminPostsController@index') }}">
                        <span class="glyphicon glyphicon-tags"></span> &nbsp;Posts</a></li>
                    <li><a href="{{ action('AdminCategoriesController@index') }}">
                        <span class="glyphicon glyphicon-user"></span> &nbsp;Categories</a></li>
                    <li><a href="{{ action('AdminMediaController@index') }}">
                        <span class="glyphicon glyphicon-comment"></span> &nbsp;Media</a></li>
                    <li><a href="{{ action('AdminCommentsController@index') }}">
                        <span class="glyphicon glyphicon-comment"></span> &nbsp;Comments</a></li>
                </ul>
            </div> <!--ending col-sm-2 -->
            <div class="col-sm-9">
                 @yield('content')
            </div> <!-- ending of col-sm-10 -->
        </div> <!-- ending of row -->
    </div> <!-- ending of container-fluid -->

     @yield('scripts')
</body>
</html>