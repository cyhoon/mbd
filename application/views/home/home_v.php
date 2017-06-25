<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no"/>
    <title>DGSW_CYH</title>
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
            <li><a href="/mbd/night/night_list">LIST</a></li>
            <li><a href="/mbd/night/night_request">REQUEST</a></li>
            <li><a href="/mbd/board/lists"/>BOARD</a></li>
<!--            <li class="dropdown">-->
<!--                <a data-toggle="dropdown" href="#">NIGHT<span class="caret"></span></a>-->
<!--                <ul class="dropdown-menu" role="menu">-->
<!--                    <li><a role="menuitem" href="/mbd/night/night_list">list</a></li>-->
<!--                    <li><a role="menuitem" href="/mbd/night/night_request">request</a></li>-->
<!--                </ul>-->
<!--            </li>-->
            <?php
            if( $this->session->userdata('logged_in')==TRUE) {
                ?>
                <li><a href="/mbd/auth/logout">LOGOUT</a></li>
                <?php
            }
            ?>
            <a class="navbar-brand navbar-right" href="/mbd/home">
                <img alt="brand" src="/mbd/include/img/dgsw_logo.png">
            </a>
        </ul>
    </header>

    <h1></h1>

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
                <img src="/mbd/include/img/school1.jpg" alt="1.jpg">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <img src="/mbd/include/img/school2.jpg" alt="2.jpg">
                <div class="carousel-caption">
                </div>
            </div>

        </div>

<!--        --><?php
//        print_r($info);
//        exit;
//        ?>
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
    <br>
    <div class="alert alert-warning alert-dismissible text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php
        if($this->session->userdata('logged_in')==TRUE) {
            ?>
            <strong> 좋은 하루 보내세요 </strong> <?php echo $users_info->name ?>님<br>
            <?php
        }else {
            ?>
            <strong> 방문을 진심으로 환영합니다</strong><br>
            <?php
        }
        ?>
    </div>
    <?php
    if($this->session->userdata('logged_in')==TRUE) {
    ?>
    <div class="col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    USER INFORMATION
                </h3>
            </div>
            <div class="panel-body">
                    <p class="glyphicon glyphicon-user"> name-> <?php echo $users_info->name ?> </p><br>
                    <p class="glyphicon glyphicon-fire"> class-> <?php echo $users_info->group?><?php echo $users_info->identi?>번</p><br>
                    <p class="glyphicon glyphicon-bell"> night-> <?php echo $night_info->req_state?></p><br>
                    <p class="glyphicon glyphicon-eye-close"> state-> <a href="/mbd/auth/logout"> 로그아웃</a></p>
            </div>
        </div>
    </div>
        <div class="col-md-8 text-center">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">School Information</h3>
                </div>
                <div class="panel-body">
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-thumbs-up"></span> <a href="https://www.facebook.com/dgsw.hs.kr/?fref=ts">FACKEBOOK</a>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-globe"></span> <a href="http://www.dgsw.hs.kr/index.do">SCHOOLHOME</a>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-home"></span> <a href="http://hackeryh.tistory.com/38">MYBLOG</a>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <span style="color:#204d74">Create by</span> <a href="https://www.facebook.com/profile.php?id=100004980286741">ChoiYoungHoon</a>
                </div>
            </div>
        </div>
        <?php
    }else {
        ?>
        <div class="col-md-5">
            <div class="alert alert-danger text-center" role="alert">
                <p>로그인 되어있지 않습니다.</p><br>
                <p class="glyphicon glyphicon-off"></p>
                <a href="/mbd/auth" class="alert-link">로그인 또는 회원가입 하러 가기</a>
            </div>
        </div>
<!--        <div class="col-md-2"></div>-->
        <div class="col-md-7">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">School Information</h3>
                </div>
                <div class="panel-body">
                    <div class="col-sm-4">
                    <span class="glyphicon glyphicon-thumbs-up"></span> <a href="https://www.facebook.com/dgsw.hs.kr/?fref=ts">FACKEBOOK</a>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-globe"></span> <a href="http://www.dgsw.hs.kr/index.do">SCHOOLHOME</a>
                    </div>
                    <div class="col-sm-4">
                        <span class="glyphicon glyphicon-home"></span> <a href="http://hackeryh.tistory.com/38">MYBLOG</a>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br><br><br>
        <div class="panel panel-default text-center">
            <div class="panel-footer">
                <span style="color:#204d74">Create by</span> <a href="https://www.facebook.com/profile.php?id=100004980286741">ChoiYoungHoon</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</body>
<script src="/mbd/include/js/bootstrap.min.js"></script>
<script>
    $('.carousel').carousel()
</script>
</html>