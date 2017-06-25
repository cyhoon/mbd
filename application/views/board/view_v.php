<br><br><br>
<aritcle id="board_area">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?php echo $views->subject; ?>
            </h3>
        </div>
        <div class="panel-body">
            <table cellspacing="0" cellpadding="0" class="table table-striped">
                <thead class="pull-right">
                    <tr>
                        <th scope="col">이름 : <?php echo $views->user_name; ?></th>
                        <th scope="col">조회수 : <?php echo $views->hits; ?></th>
                        <th scope="col">등록일 : <?php echo $views->reg_date; ?></th>
                    </tr>
                </thead>

            </table>
            <?php echo $views->contents; ?>
        </div>
    </div>
    <div class="pull-right">
        <a href="http://localhost/mbd/board/lists" class="btn btn-primary btn">목록</a>
        <a href="http://localhost/mbd/board/write" class="btn btn-primary btn-success">쓰기</a>
        <a href="http://localhost/mbd/board/modify/<?php echo $this->uri->segment(4); ?>" class="btn btn-primary btn-warning">수정</a>
        <a href="http://localhost/mbd/board/delete/<?php echo $this->uri->segment(4); ?>" class="btn btn-primary btn-danger">삭제</a>
    </div>
    <br>
</aritcle>
<br><br><br><br><br>