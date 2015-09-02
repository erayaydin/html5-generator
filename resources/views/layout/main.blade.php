<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />

    <!-- Bootstrap -->
    <link href="{!! asset("assets/plugins/bootstrap/css/bootstrap.min.css") !!}" rel="stylesheet" />

    <!-- Bootswatch Lumen -->
    <link href="{!! asset("assets/plugins/bootstrap/css/bootstrap-lumen.min.css") !!}" rel="stylesheet" />
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav">
                <span class="sr-only">{!! Lang::get("keywords.togglenavigation") !!}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{!! Config::get("app.name")  !!}</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{!! URL::route("generate")  !!}" title="{!! Lang::get("keywords.generate") !!}">{!! Lang::get("keywords.generate") !!} <span class="label label-warning">{!! Lang::get("keywords.beta") !!}</span></a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container-fluid">
    @yield("content")
</div>

<!-- jQuery -->
<script src="{!! asset("assets/plugins/jquery/jquery-1.11.3.min.js") !!}"></script>

<!-- Bootstrap -->
<script src="{!! asset("assets/plugins/bootstrap/js/bootstrap.min.js") !!}"></script>
</body>
</html>