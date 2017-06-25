<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="apple-mobile-wep-app-capable" content="yes" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title>CodeIgniter</title>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="/mbd/include/js/jquery-3.0.0.min.js"></script>
    <link rel='stylesheet' href="/mbd/include/css/bootstrap.css" />
    <link href="/mbd/include/css/custom.css" rel="stylesheet">
    <style>
        .mbd_form{
            text-align: center;
            width:  50%;
            margin: 0 auto;
        }

        .mbd_margin{
            marign-top: 80px;
            margin-bottom: 80px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1> Register here! </h1>
        </div>

        <!-- 폼 전송 시 : POST 로 name 데이터가 넘어간다. -->

<!--   아이디 : userid 비밀번호 : password 이름 : username , 성별 : gender , 학년::반 : group  번호 : identi  -->


        <form class="mbd_form" action="/mbd/member/join" method="post">
            <label for="id">아이디</label>
            <div class="input-group">
                <span class="input-group-addon"> <span class="glyphicon glyphicon-user"> </span> </span>
                <input type="text" class="form-control" id="id" name="userid" placeholder="영문자 또는 숫자만 허용">
            </div>

            <br>

            <label for="password">비밀번호</label>
            <div class="input-group">
                <span class="input-group-addon"> <span class="glyphicon glyphicon-lock"> </span> </span>
                <input type="password" class="form-control" id="password" name="password" placeholder="비밀번호">
            </div>

            <br>

            <div class="form-group">
                <label for="username">이름</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="이름">
            </div>

            <div class="form-group">
                <label for="gender">성별</label><br>
                <label class="radio-inline" name="gender">
                    <input type="radio" name="gender" id="boy" value="boy" checked="checked"> 남자
                </label>
                <label class="radio-inline">
                    <input type="radio" name="gender" id="girl" value="girl"> 여자
                </label>
            </div>
            
            <div class="form-group">
                <label for="group">학년::반</label>
                <select class="form-control" name="group">
                    <option>1학년1반</option>
                    <option>1학년2반</option>
                    <option>1학년3반</option>
                </select>
            </div>

            <div class="form-group">
                <label for="gender">번호</label>
                <select class="form-control" name="identi">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                    <option>13</option>
                    <option>14</option>
                    <option>15</option>
                    <option>16</option>
                    <option>17</option>
                    <option>18</option>
                    <option>19</option>
                    <option>20</option>
                </select>
            </div>

            <div class="controls">
                <p class="help-block"><?php echo validation_errors(); ?></p>
            </div>

            <a href="#myModal" data-toggle="modal">이용 규칙</a><p></p>


            <div class="form-actions text-center">
                <button type="submit" class="btn btn-info">회원가입<i class="fa fa-check spaceLeft"></i></button>
                <button type="submit" class="btn btn-warning" onclick="history.go(-1)"> 가입취소 <i class="fa fa-times spaceLeft"></i></button>
            </div>

        </form>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel"> 이용 규칙 </h4>
                    </div>
                    <div class="modal-body">
                        <p> test </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                    </div>
                </div> <!-- 모달 콘텐츠 -->
            </div> <!-- 모달 다이얼로그 -->
        </div> <!-- 모달 전체 윈도우 -->
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/mbd/include/js/bootstrap.min.js"></script>

</body>
</html>