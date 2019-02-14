<?php
  require_once('../conn42.php');
  require_once('./int/header.php');
  $id=$_GET['id'];

  // 先把資料取出，顯示在form上
  $sql = "SELECT * FROM jobs  WHERE id=" . $id;
  $result = $db->prepare($sql);
  $result -> execute(array($id));
  $row = $result->fetch(PDO::FETCH_ASSOC); //取出結果
  ?>

    <div class="jobs">
      <div class="job">
        <form action="./update_handle.php" method="POST">
          <input name="title" type="text" value="<?php echo $row['title']?>" placeholder="Title">
          <textarea name="description" rows="10" placeholder="Description" ><?php echo $row['description'] ?> </textarea>
          <input name="salary" type="text" value="<?php echo $row['salary']?>" placeholder="Salary">
          <input name="deadline" type="date" value="<?php echo $row['deadline']?>" placeholder="Deadline">
          <input name="link" type="text" value="<?php echo $row['link']?>" placeholder="Link">
          
          <input type="hidden" name="id" value="<?php echo $row['id']?>"><!-- 把ID藏在這裡待過去update handle -->
          <input type="submit" value="Update">
        </form>
        </div>
      </div>
     
    </div>

<?php require_once('./int/footer.php'); ?>