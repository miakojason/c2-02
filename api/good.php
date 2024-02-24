<?php include_once "./db.php";
$news = $News->find($_POST['newsid']);
if ($Log->count(['news' => $_POST['newsid'], 'acc' => $_SESSION['user']]) > 0) {
  $Log->del(['news' => $_POST['newsid'], 'acc' => $_SESSION['user']]);
  $news['good']--;
} else {
  $Log->save(['news' => $_POST['newsid'], 'acc' => $_SESSION['user']]);
  $news['good']++;
}
$News->save($news);