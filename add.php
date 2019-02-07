<?php require_once('./int/header.php'); ?>

    <div class="jobs">
      <div class="job">
        <form action="./add_handle.php" method="POST">
          <input name="title" type="text" placeholder="Title" required>
          <textarea name="description" rows="10" placeholder="Description" required></textarea>
          <input name="salary" type="text" placeholder="Salary" required>
          <input name="deadline" type="date" placeholder="Deadline" required>
          <input name="link" type="text" placeholder="Link" required>
          <input type="submit" value="Add">
        </form>
      </div>
    </div>
    
  <?php require_once('./int/footer.php'); ?>