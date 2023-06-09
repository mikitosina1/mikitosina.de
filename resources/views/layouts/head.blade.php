@section('head')
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="my own blog"/>
    <meta name="author" content="Zarichnyi Mykyta"/>
    <link rel="shortcut icon" href="{{ URL::to('/') }}/svg/favicon.ico" type="image/x-icon">
    <link href="{{ URL::to('/') }}/css/app.css" rel="stylesheet">
	<link href="{{ URL::to('/') }}/css/mainSaas.css" rel="stylesheet">
	<link href="{{ URL::to('/') }}/css/blocks/user_block.css" rel="stylesheet">
    <?php
        $title = app()->view->getSections()['head_css'];
        $title = trim($title," ");
    ?>
    <link href="{{ URL::to('/') }}/css/page/{{$title}}.css" rel="stylesheet">
	<title> @yield('head_title') </title>
</head>
