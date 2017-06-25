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
    <style>
        @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400);
        /* 아이콘 부분 */
        .service {margin: 40px 0;}
        .service a { display: block;}
        .icontxt { display: block; color: #2E2F28; text-align: left; }
        .icontxt h4 {font-weight: bold; font-family: 'Source Sans Pro'; font-size: 20px; text-transform: uppercase; text-align: left;}
        .icons {
            float: left;
            display: block;
            font-size: 30px;
            color: #fff;
            background-color: #FF8000;
            border-radius: 50%;
            text-align: center;
            margin-right: 15px ;
            padding: 20px;
            border:4px solid #FF8040;
            transition: all 0.3s;
        }

        .service a:hover .icons  { background-color:#0080C0;}
        .service a:hover .icontxt h4 { color: #0080FF; }

        @media (min-width: 768px) {
            .icons { margin: 0 auto; position: relative; left: 30%;}
            .icontxt h4 { text-align: center;}
        }

        @media (max-width: 360px) {
            .icontxt p { display: none; }
            .icontxt {line-height:10px; padding: 0; margin: 0;}
            .icontxt h4 { display: none; }
            .icons { padding: 20px; margin: 10px 0 10px 20px; }
            .book img { width: 50%; height: auto;}
            .control { display: none;}
        }


    </style>
</head>
<body>
<div class="container">
    <header id="header" data-role="header" data-position="fixed">
        <ul class="nav nav-tabs">
            <li class="active"><a href="/mbd/home">HOME</a></li>
            <li><a href="#">PICTURE</a></li>
            <li><a href="/mbd/rank">USER RANKING</a></li>
            <li class="dropdown">
                <a data-toggle="dropdown" href="#">NIGHT<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a role="menuitem" href="/mbd/night/night_list">list</a></li>
                    <li><a role="menuitem" href="/mbd/night/night_request">request</a></li>
                </ul>
            </li>
            <a class="navbar-brand navbar-right" href="/mbd/home">
                <img alt="brand" src="/mbd/include/img/dgsw_logo.png">
            </a>
        </ul>
    </header>
        <h1></h1>

    <div class="row">

        <div class="col-sm-9 blog-main">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="/mbd/include/img/1.jpg" alt="1.jpg">
                        <div class="carousel-caption">
                        </div>
                    </div>
                    <div class="item">
                        <img src="/mbd/include/img/2.jpg" alt="2.jpg">
                        <div class="carousel-caption">
                        </div>
                    </div>

                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            
<!--      추가 부분      -->

            
        </div><!-- /.blog-main -->

        <div class="col-sm-2 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">

                    <?php
                    if( $this->session->userdata('logged_in')==TRUE)
                    {
                        ?>
                        <p class="glyphicon glyphicon-user"><?php echo $this->session->userdata('username')?></p><br>
                        <a href="/mbd/auth/logout"> 로그아웃</a>

                        <?php
                    } else {
                        ?>
                        <a href="/mbd/auth/login" class="btn btn-primary">로그인</a>
                        <?php
                    }
                    ?>
            </div>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->
    <footer id="footer" style="margin-top:60px;">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <p>Posted by: BootStrap</p>
                <p>Contact information: <a href="http://hackeryh.tistory.com/">h61cker me blog</a></p>
                <p> B0ard Project </p>
            </div>
        </div>
    </footer>
</div><!-- /.container -->

</body>
<script src="/mbd/include/js/bootstrap.min.js"></script>
<script>
    $('.carousel').carousel()
</script>
</html>