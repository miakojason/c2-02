<style>
    .title {
        cursor: pointer;
    }

    .pop {
        background: rgba(51, 51, 51, 0.8);
        color: #FFF;
        min-height: 100px;
        width: 300px;
        height: 300px;
        position:absolute;
        display: none;
        z-index: 9999;
        overflow: auto;
    }
</style>
<fieldset>
    <legend>目前位置:首頁>人氣文章區</legend>
    <table>
        <tr>
            <th>標題</th>
            <th>內容</th>
            <th>人氣</th>
        </tr>
        <?php
        $total = $News->count();
        $div = 5;
        $pages = ceil($total / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $news = $News->all(['sh' => 1], " order by `good` desc limit $start,$div ");
        foreach ($news as $new) {
        ?>
            <tr>
                <td class="title clo" data-id="<?= $new['id']; ?>"><?= $new['title']; ?></td>
                <td>
                    <div id="s<?= $new['id']; ?>"><?= mb_substr($new['text'], 0, 20); ?>...</div>
                    <div id="p<?= $new['id']; ?>" class="pop" style="display: none;"><h3 style="color: lightblue;"><?= $new['title']; ?></h3><?= $new['text']; ?></div>
                </td>
                <td>
                    <?= $new['good']; ?>個人說<img src="./icon/02B03.jpg" style="width:20px">
                    <?php
                    if (isset($_SESSION['user'])) {
                        if ($Log->count(['news' => $new['id'], 'acc' => $_SESSION['user']]) > 0) {
                            echo "<a href='Javascript:good({$new['id']})'>收回讚</a>";
                        } else {
                            echo "<a href='Javascript:good({$new['id']})'>讚</a>";
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct">
        <?php
        if ($now > 1) {
            $prev = $now - 1;
            echo "<a href='?do=$do&p=$prev'><</a>";
        }
        for ($i = 1; $i <= $pages; $i++) {
            $fontsize = ($now == $i) ? '24px' : '16px';
            echo "<a href='?do=$do&p=$i' style='font-size:$fontsize'>$i</a>";
        }
        if ($now < $pages) {
            $next = $now + 1;
            echo "<a href='?do=$do&p=$next'>></a>";
        }
        ?>
    </div>
</fieldset>
<script>
    $(".title").hover(function() {
        $(".pop").hide()
        let id = $(this).data('id');
        $("#p" + id).show();
    })


    function good(newsid) {
        $.post("./api/good.php", {
            newsid
        }, () => {
            location.reload();
        })
    }
</script>