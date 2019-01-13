<?php
$conn = mysqli_connect(
  //host
  //user
  //pw
  //database
);
  /* single row
  $sql = "SELECT * FROM topic WHERE id=1";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  echo '<h1>'.$row['title'].'</h1>';
  echo $row['description'];
  */

  // multi row
  $sql = "SELECT * FROM topic";
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_array($result)) {
    echo '<h1>'.$row['title'].'</h1>';
    echo $row['description'];
  }
?>
