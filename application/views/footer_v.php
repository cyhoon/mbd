<footer id="footer">
	<div class="panel panel-default">
		<div class="panel-body text-center">
			<p>
				<?php
				if( $this->session->userdata('logged_in')==TRUE)
				{
					?>
					<?php echo $this->session->userdata('username')?>님 환영합니다.<br>
					<a href="/mbd/auth/logout"> 로그아웃</a>

					<?php
				} else {
					?>
					<a href="/mbd/auth/login" class="btn btn-primary">로그인</a>
					<?php
				}
				?>
			</p>
			<p>Posted by: BootStrap</p>
			<p>Contact information: <a href="http://hackeryh.tistory.com/">h61cker me blog</a></p>
			<p> B0ard Project </p>
		</div>
	</div>
</footer>
</div>
</body>
<script src="/mbd/include/js/bootstrap.min.js"></script>
</html>