<?php
  require_once('../conn42.php');
  require_once('./int/header.php');
  require_once('./utils/Parsedown.php');
  require_once('./utils/utils.php');
  ?>

    <div class="jobs">
    <?php
      // mysql 取資料顯示 以降序顯示
      $sql = "SELECT * FROM jobs ORDER BY created_at DESC"; 
      $results = [];
      $select = $db->prepare($sql); 
      $select -> execute($results);
      $results = $select->fetchAll(PDO::FETCH_ASSOC); //fatchAll要依照取的資料型態下參數

      foreach($results as $result){
        //將查詢出的資料輸出
        // 撈出內容轉成吃 Markdown 格式
        $description = $result['description'];
        $md = new Parsedown();
        $md->setSafeMode(true); 
        $description = $md->text($description); // 把內文轉成 markdown 格式

        echo "<div class='job'>";
        echo "<h2 class='job__title'>" .$result['title']. "</h2>";
        echo "<p class='job__desc'>" . $description ."</p>";
        echo "<p class='job__salary'>" .$result['salary'] . "</p>";
        echo "<p class='job__deadline'>" .$result['deadline'] ."</p>";
        echo "<a href='".$result['link']."' class='link' target='_blank'>plus info</a><br>";
        echo "<div class='job__foot'>";
        echo  "<a href='./update.php?id=".$result['id']."' class='bnt'>Update</a>";
        echo  "<a href='./delete.php?id=".$result['id']."' class='bnt'>Delete</a>";
        echo "</div>";
        echo "</div>";
      }
      ?>
      </div>
    
  <?php require_once('./int/footer.php'); ?>
