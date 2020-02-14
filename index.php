<?php include("db.php"); ?>


<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset();
      } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="save_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Task Title" autofocus>
          </div>
          <div class="form-group">
            <textarea name="family" rows="2" class="form-control" placeholder="Task Description"></textarea>
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="Save">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>نام</th>
            <th>نام خانوادگی</th>
            <th>دوره ها</th>
            <th>عملیات</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $conn -> set_charset("utf8");
          $query = "SELECT * FROM core_members";
          $result_tasks = mysqli_query($conn, $query);
          
          //mysql_query ("set collation_connection='utf8_general_ci'"); 

          while ($row = mysqli_fetch_assoc($result_tasks)) { ?>
            <tr>
              <td><?php echo $row['display_name']; ?></td>
              <td><?php echo $row['family']; ?></td>
              <td><?php echo $row['doreha']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td>
                <a href="edit.php?member_id=<?php echo $row['member_id'] ?>" class="btn btn-secondary">
                  <i class="fas fa-marker"></i>
                </a>
                <a href="delete_task.php?member_id=<?php echo $row['member_id'] ?>" class="btn btn-danger">
                  <i class="far fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>