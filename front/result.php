<?php
$que = $Que->find($_GET['id']);
?>
<fieldset>
    <legend>目前位置:首頁>問卷調查><?= $que['text']; ?></legend>
    <h3><?= $que['text']; ?></h3>
    <?php
    $opts = $Que->all(['subject_id' => $que['id']]);
    foreach ($opts as $opt) {
        $total = ($que['vote'] != 0) ? $que['vote'] : 1;
        $rate = round($opt['vote'] / $total, 2);
    ?>
        <div style="display: flex;">
            <div style="width: 50%;"><?= $opt['text']; ?></div>
            <div class="clo" style="width:<?= 40 * $rate; ?>% "></div>
            <div style="width: 10%;"><?= $opt['vote']; ?>票(<?= $rate * 100; ?>%)</div>
        </div>
    <?php
    }
    ?>
    <div class="ct"><input type="button" value="返回" onclick="location.href='?do=que'"></div>
</fieldset>