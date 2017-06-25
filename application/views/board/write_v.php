<article id="board_area" class="mbd_top">
    <form method="post">

        <input type="text" class="form-control" placeholder="제목" name="subject"><br><br>
        <textarea name="contents"></textarea><br>

        <div class="mbd_margin">
            <input type="button" onclick="history.go(-1);" class="btn btn-danger  pull-right mbd_space" value="취소">
            <input type="submit" class="btn btn-success pull-right" value="등록">
        </div>
    </form>
    <div class="controls">
        <p class="help-block"><?php echo validation_errors(); ?></p>
    </div>

    <script>
        CKEDITOR.replace('contents');
    </script>
</article>