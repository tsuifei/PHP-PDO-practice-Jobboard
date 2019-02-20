<?php
  require_once('../conn42.php');
  require_once('./int/header.php');
  require_once('./utils/Parsedown.php');
  require_once('./utils/utils.php');
  ?>

    <div class="jobs">
      <?php
      // mysql 取資料顯示 只顯示沒過期的+以降序顯示
      $sql = "SELECT * FROM jobs WHERE deadline >= NOW() ORDER BY created_at DESC"; 
      
      $results = [];
      $select = $db->prepare($sql); 
      $select -> execute($results);
      $results = $select->fetchAll(PDO::FETCH_ASSOC); //fatchAll要依照取的資料型態下參數
      foreach($results as $result){

      // 撈出內容轉成吃 Markdown 格式
      $description = escapeOut($result['description']);
      $md = new Parsedown();
      $md->setSafeMode(true); 
      $description = $md->text($description); // 把內文轉成 markdown 格式


        //將查詢出的資料輸出
        echo "<div class='job'>";
        echo "<h2 class='job__title'>" .escapeOut($result['title']). "</h2>";
        echo "<p class='job__desc'>" . $description ."</p>";
        echo "<p class='job__salary'>" .escapeOut($result['salary']) . "</p>";
        echo "<p class='job__deadline'>" .escapeOut($result['deadline']) ."</p>";
        echo "<a href='".escapeOut($result['link'])."' class='link' target='_blank'>plus info</a><br>";
        echo "</div>";
      }
      ?>

    </div>
  
<?php require_once('./int/footer.php'); ?>
