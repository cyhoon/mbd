<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no"/>
    <title>CodeIgniter</title>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <link rel='stylesheet' href="/mbd/include/css/bootstrap.css"/>
    <link href="/mbd/include/css/custom.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <header id="header" data-role="header" data-position="fixed">
        <ul class="nav nav-tabs">
            <li><a href="./home">HOME</a></li>
            <li><a href="#">PICTURE</a></li>
            <li class="active"><a href="./rank">USER RANKING</a></li>
            <li class="dropdown">
                <a data-toggle="dropdown" href="#">NIGHT<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a role="menuitem" href="/mbd/night/night_list">list</a></li>
                    <li><a role="menuitem" href="/mbd/night/night_request">request</a></li>
                </ul>
            </li>
            <li><a href="/mbd/auth">LOGIN</a></li>
            <a class="navbar-brand navbar-right" href="./home">
                <img alt="brand" src="/mbd/include/img/dgsw_logo.png">
            </a>
        </ul>
    </header>