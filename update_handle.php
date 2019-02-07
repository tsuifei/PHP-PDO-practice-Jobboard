<?php
  require_once('./conn.php');

  $title = $_POST['title'];
  $desc = $_POST['description'];
  $salary = $_POST['salary'];
  $deadline = $_POST['deadline'];
  $link = $_POST['link'];
  $id = $_POST['id']; 
  
  // 確認是否填入資料為空
  if (empty($title) || empty($desc) || empty($salary) || empty($deadline) || empty($link) ) { 
    die('il faut tout remplier');
  } else { 

  // 更新資料
  $sql = "UPDATE jobs SET title='$title', description = '$desc',salary='$salary',deadline = '$deadline',link = '$link' WHERE id = " .$id;
  $update = $db->prepare($sql);
  $result = $update->execute(array($title, $desc, $salary, $deadline, $link));

  if ($result) {  
    header('Location: ./index.php');
  } else {  
    echo 'failed';
    die($e->getMessage()); 
  }
  

  }
?>