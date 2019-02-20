<?php
  require_once('../conn42.php');
  require_once('./utils/utils.php');

  $title = escapeIn($_POST['title']);
  $desc = escapeIn($_POST['description']);
  $salary = escapeIn($_POST['salary']);
  $deadline = escapeIn($_POST['deadline']);
  $link = escapeIn($_POST['link']);
  $id = escapeIn($_POST['id']); 
  
  // 確認是否填入資料為空
  if (empty($title) || empty($desc) || empty($salary) || empty($deadline) || empty($link) ) { 
    die('il faut tout remplier');
  } else { 
    // 更新資料
    $sql = "UPDATE jobs SET title='$title', description = '$desc', salary='$salary', deadline = '$deadline',link = '$link' WHERE id = " .$id;
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