<article id="board_area">
    <div class="jumbotron">
        <h1><span style="font-size:50px;">심야 자율 학습 신청자 목록.</span></h1>

        <br><br>
        <p> 심야 자율 학습 이란 ? </p>
        <p></p>
        <p> 오래전 부터 전해진 대구소프트웨어고등학교 고유의 공부 풍습입니다. </p>
        <p></p>
        <p>지금 당장 신청 하세요!</p>
    </div>
    <table cellspacing="0" cellpadding="0" class="table table-hover">
        <thead>
        <tr class="success">
            <th scope="col">이름</th>
            <th scope="col">성별</th>
            <th scope="col">학년::반</th>
            <th scope="col">번호</th>
            <th scope="col">신청상태</th>
            <th scope="col">날짜</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach( $list as $lt ) {
            ?>
            <tr>
                <td><?php echo $lt->name ?></td>
                <td><?php echo $lt->gender ?></td>
                <td><?php echo $lt->group ?></td>
                <td><?php echo $lt->identi ?></td>
                <td><?php echo $lt->req_state ?></td>
                <td><?php echo $lt->req_date ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</article>