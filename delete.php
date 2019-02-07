<?php
require_once('./conn.php');

$id = $_GET['id'];

// 刪除資料
$sql = "DELETE FROM jobs WHERE id = " .$id;
$delete = $db->prepare($sql);
$delete->execute([$id]);
if($delete){ 
  header("Location: ./admin.php");
} else {
  echo 'failed : ';
  die($e->getMessage()); 
}

?>