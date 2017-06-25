<br><br>
<article id="board_area">

    <div class="jumbotron text-center">
        <h1> 안녕 , 유저들아! </h1><br><br>
        <p style="color:red"> 여기는 자유게시판 쓰고 싶은거 마음껏 쓰셈! </p>
    </div>
    <table cellspacing="0" cellpadding="0" class="table table-hover">
        <thead>
        <tr>
            <th scope="col">번호</th>
            <th scope="col">제목</th>
            <th scope="col">작성자</th>
            <th scope="col">조회수</th>
            <th scope="col">작성일</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach( $list as $lt ) {
            ?>
            <tr>
                <th scope="row">
                    <?php echo $lt->board_id; ?>
                </th>
                <td><a rel="external" href="/mbd/board/view/my_board/<?php echo $lt->board_id;?>"><?php echo $lt->subject;?></a></td>
                <td><?php echo $lt->user_name; ?></td>
                <td><?php echo $lt->hits ?></td>
                <td><?php echo $lt->reg_date ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <div class="pull-right">
        <a href="http://localhost/mbd/board/lists" class="btn btn-primary btn">목록</a>
        <a href="http://localhost/mbd/board/write" class="btn btn-primary btn-success">쓰기</a>
    </div><br><br>
    <nav class="text-center">
        <ul class="pagination pagination-sm">
            <?php echo $pagination;?>
        </ul>
    </nav>
</article>
<br>