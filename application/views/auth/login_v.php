<?php
	if($this->session->userdata('logged_in')==TRUE)
	{
		echo "
			<script>
				alert('이미 로그인 하셨습니다.');
 				history.go(-1);
 			</script>
 		";
		exit;
	}
?>
<article id = "board_area">

	<header>
		<h1 class="mbd_margin"></h1>
	</header>
<!--	.mbd_form .mbd_margin-->

	<form role="form" class="form-horizontal text-center mbd_form" id="auth_login" method="post" action="">
			<div class="form-group">
<!-- 폼 전송 시 : POST 로 name 데이터가 넘어간다. -->
<!--				id : input01              name = username                      -->
				<label class="control-label" for="input01"></label>
				<div class="controls">
					<input type="text" class="form-control" id="input01" name="username" placeholder="name" value="<?php echo set_value('username');?>">
					<p class="help-block"></p>
				</div>

<!--		id : input02	name : password		-->
				<label class="control-label" for="input02"></label>
				<div class="controls">
					<input type="password" class="form-control" id="input02" name="password" placeholder="password" value="<?php echo set_value('password');?>">
					<p class="help-block"></p>
				</div>

<!--			폼 검증 라이브러리	-->
				<div class="controls">
					<p class="help-block"><?php echo validation_errors(); ?></p>
				</div>

				<div class="form-actions">
					<button type="submit" class="btn btn-success btn-lg btn-block"> 전송 </button>
				</div>

				<br><br>

				<div class="text-right">
					<?php
					if( $this->session->userdata('logged_in')==TRUE) {
						?>
						<button type="button" class="btn btn-default" disabled="disabled" onclick="window.location.href='/mbd/member';">register</button>
						<?php
					}else {
						?>
						<button type="button" class="btn btn-danger" onclick="window.location.href='/mbd/member';">register</button>
						<?php
					}
					?>
					<button class="btn btn-warning" onclick="document.location.reload()">취소</button>
				</div>
			</div>
	</form>

</article>
