<?php
  require_once('../conn42.php');

  $title = $_POST['title'];
  $desc = $_POST['description'];
  $salary = $_POST['salary'];
  $deadline = $_POST['deadline'];
  $link = $_POST['link'];
  
  // 確認是否可從form拿到資料
  // echo $title . ' ' . $desc . ' ' . $salary . ' ' . $deadline . ' ' . $link;

  // 確認是否填入資料為空
  if (empty($title) || empty($desc) || empty($salary) || empty($deadline) || empty($link) ) { 
    echo '<script language="JavaScript">;alert("Please fill in all the required fields.");location.href="./add.php";</script>;';
    // die('');
  } else { 

    // 新增資料
  $sql = "INSERT INTO jobs(title,description,salary,deadline,link) values(?,?,?,?,?)";
  $insert = $db->prepare($sql);
  $result = $insert->execute(array($title,$desc, $salary, $deadline, $link));

  if ($result) {  
    header('Location: ./index.php');
  } else {  
    echo 'failed';
    die($e->getMessage()); 
  }
  }
?>