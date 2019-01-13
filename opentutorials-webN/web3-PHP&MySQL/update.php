<?php
$conn = mysqli_connect(
  //host
  //user
  //pw
  //database
);
  $sql = "SELECT * FROM topic";
  $result = mysqli_query($conn, $sql);
  $list = '';
  while($row = mysqli_fetch_array($result)) {
    //<li><a href="index.php?id=1">CSS</a></li>
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title'=>"Welcome",
    'description'=>"Hello, Web"
  );
  $update_link = '';
  if(isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $article['title']=$row['title'];
    $article['description']=$row['description'];

    $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
  }
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>WEB</title>
  </head>
  <body>
    <h1><a href="index.php">WEB</a></h1>
    <ol>
      <?=$list?>
    </ol>
    <form action="update_process.php" method="POST">
      <input type="hidden" name="id" value=<?=$_GET['id']?>>
      <p><input type="text" name="title" placeholder="Title" value=<?=$article['title']?>></p>
      <p><textarea name="description" placeholder="Description"><?=$article['description']?></textarea></p>
      <p><input type="submit" value="submit"></p>
    </form>
  </body>
</html>
