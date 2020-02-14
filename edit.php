<?php
include("db.php");

$name = '';
$family = '';

if (isset($_GET['member_id'])) {
  $id = $_GET['member_id'];
  $query = "SELECT * FROM core_members WHERE member_id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row['name'];
    $family = $row['family'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['member_id'];
  $name = $_POST['name'];
  $family = $_POST['family'];

  $query = "UPDATE task set name = '$name', family = '$family' WHERE member_id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
        <form action="edit.php?member_id=<?php echo $_GET['member_id']; ?>" method="POST">
          <div class="form-group">
            <input name="name" type="text" class="form-control" value="<?php echo $name; ?>" placeholder="Update name">
          </div>
          <div class="form-group">
            <textarea name="family" class="form-control" cols="30" rows="10"><?php echo $family; ?></textarea>
          </div>
          <button class="btn-success" name="update">
            Update
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>