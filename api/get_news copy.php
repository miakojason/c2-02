<?php include_once "./db.php";
$news = $News->find($_GET['id']);
echo "<b>" . $news['title'] . "</b>";
echo "<br>";
echo nl2br($news['news']);