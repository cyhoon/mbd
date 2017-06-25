<article id="board_area">
    <header>
        <h1 class="mbd_margin"></h1>
    </header>

    <form role="form" class="mbd_form" action="" method="post" class="form-horizontal" id="auth_login">

        <div class="form-group">
            <label for="name">이름</label>
            <input type="text" class="form-control" size="40" placeholder="username" value="<?php echo set_value('username');?>">
        </div>

        <div class="form-group">
            <label for="password">비밀번호</label>
            <input type="password" class="form-control" placeholder="password" value="<?php echo set_value('password');?>">
        </div>

        <div class="controls">
            <p class="help-block"><?php echo validation_errors(); ?></p>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block"> 전송 </button>
        </div>

        <div class="controls"><p class="help-block"><?php echo validation_errors();?></p></div>

    </form>

    <span class="mbd_margin"></span>
    <div class="text-right">
        <button type="button" class="btn btn-danger">register</button>
    </div>

</article>
<h1 class="mbd_margin"></h1>