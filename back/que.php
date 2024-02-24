<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <div style="display:flex">
            <div class="clo">問卷名稱</div>
            <input type="text" name="subject" id="">
        </div>
        <div class="clo">
            <div id="opt">選項<input type="text" name="option[]" id=""><input type="button" value="更多" onclick="more()"></div>
        </div>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>
</fieldset>
</form>
<script>
    function more() {
        let opt = `<div>選項<input type="text" name="option[]" id=""></div>`
        $("#opt").before(opt);
    }
</script>