<article id="board_area">
    <table cellspacing="0" cellpadding="0" class="table table-hover">
        <thead>
            <tr>
                <th scope="col">랭킹</th>
                <th scope="col">닉네임</th>
                <th scope="col">조회수</th>
                <th scope="col">한 마디</th>
                <th scope="col">날짜</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $rank=1;
        foreach( $list as $lt ) {
            ?>
            <tr>
                <td><?php echo $rank++; ?></td>
                <td><?php echo $lt->user_name ?></td>
                <td><?php echo $lt->hits ?></td>
                <td><?php echo $lt->contents ?></td>
                <td><?php echo $lt->reg_date ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</article>