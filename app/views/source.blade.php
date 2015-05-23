<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="content-language" content="TR"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="all" />
    <meta name="revisit-after" content="1 days" />
    <title>{{ $project_name }}</title>

@if($favicon)
    <link rel="shortcut icon" href="{{ $asset_name }}/{{ $image_name }}/favicon.ico" />
@endif

@if($opengraph)
    <!-- Open Graph Data -->
    <meta property="og:site_name" content="" />
    <meta property="og:title" content="" />
    <meta property="og:description" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="article:published_time" content="" />
    <meta property="article:modified_time" content="" />
    <meta property="article:section" content="" />
    <meta property="article:tag" content="" />
    <meta property="fb:admins" content="" />
@endif

@if($twittercard)
    <!-- Twitter Card Data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:image" content="">
@endif

    <!-- Core CSS -->
@if($meyerreset)
    <link href="{{ $asset_name }}/{{ $plugin_name }}/meyerreset/reset.css" type="text/css" rel="stylesheet" />
@endif
@if($normalize)
    <link href="{{ $asset_name }}/{{ $plugin_name }}/normalize/normalize.css" type="text/css" rel="stylesheet" />
@endif
    <link href="{{ $asset_name }}/{{ $css_name }}/core.css" type="text/css" rel="stylesheet" />

    <!-- CSS Plugins -->
@if($animate)
    <link href="{{ $asset_name }}/{{ $plugin_name }}/animate/animate.css" type="text/css" rel="stylesheet" />
@endif
@if($bootstrap)
    <link href="{{ $asset_name }}/{{ $plugin_name }}/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="{{ $asset_name }}/{{ $plugin_name }}/bootstrap/css/bootstrap-theme.min.css" type="text/css" rel="stylesheet" />
@endif
@if($jqueryui)
    <link href="{{ $asset_name }}/{{ $plugin_name }}/jqueryui/jquery-ui.min.css" type="text/css" rel="stylesheet" />
    <link href="{{ $asset_name }}/{{ $plugin_name }}/jqueryui/jquery-ui.structure.min.css" type="text/css" rel="stylesheet" />
    <link href="{{ $asset_name }}/{{ $plugin_name }}/jqueryui/jquery-ui.theme.min.css" type="text/css" rel="stylesheet" />
@endif
@if($prettyphoto)
    <link href="{{ $asset_name }}/{{ $plugin_name }}/prettyphoto/css/prettyPhoto.css" type="text/css" rel="stylesheet" />
@endif

    <!-- Custom CSS -->
    <link href="{{ $asset_name }}/{{ $css_name }}/custom.css" type="text/css" rel="stylesheet" />

</head>
<body>

<!-- Core JS -->
<script type="text/javascript" src="{{ $asset_name }}/{{ $js_name }}/core.js"></script>

<!-- JS Plugins -->
@if($jquery)
<script type="text/javascript" src="{{ $asset_name }}/{{ $plugin_name }}/jquery/jquery-1.11.3.min.js"></script>
@endif
@if($jqueryui)
<script type="text/javascript" src="{{ $asset_name }}/{{ $plugin_name }}/jqueryui/jquery-ui.min.js"></script>
@endif
@if($bootstrap)
<script type="text/javascript" src="{{ $asset_name }}/{{ $plugin_name }}/bootstrap/js/bootstrap.min.js"></script>
@endif
@if($prettyphoto)
<script type="text/javascript" src="{{ $asset_name }}/{{ $plugin_name }}/prettyphoto/js/jquery.prettyPhoto.js"></script>
@endif

<!-- Custom JS -->
<script type="text/javascript" src="{{ $asset_name }}/{{ $js_name }}/custom.js"></script></body>
</html>