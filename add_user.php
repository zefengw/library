<?php
  include "includes/functions.php";
  include "includes/header.php";
  include "includes/sidebar.php";
  block();

  if(isset($_POST['create_user'])){
    $user_name = $_POST['user_name'];
    $person_id = $_POST['person_id'];
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_status = $_POST['book_status'];
    $user_email = $_POST['user_email'];
    $phone_number = $_POST['phone_number'];
    $query = "SELECT * FROM users";
    $select_people_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_people_query)){
        if($_POST['person_id'] === $row['person_id'] && $_POST['user_name'] !== $row['user_name']){
            die("Different Users cannot have the same Person IDs");
        }else if($_POST['user_name'] === $row['user_name']){
            die("Use \"Add Book\" Function for already-created Users");
        }
    }
    $query = "INSERT INTO users(person_id, user_name, user_email, book_title, book_status, book_author, phone_number )";
    $query .= "VALUES($person_id, '{$user_name}', '{$user_email}', '{$book_title}', '{$book_status}', '{$book_author}', '{$phone_number}' )";
    $create_user_query = mysqli_query($connection, $query);
  }
?>

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
    <?php include "includes/navigation_form.php";?>
    <form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" name="user_name">
    </div>
<div class="form-group">
        <label for="title">Person ID</label>
        <input type="number" class="form-control" name="person_id">
    </div>

    <div class="form-group">
        <label for="post_tags">Book Titles</label>
        <input type="text" class="form-control" name="book_title">
    </div>
    <div class="form-group">
        <label for="user_email">Book Authors</label>
        <input type="text" class="form-control" name="book_author">
    </div>
    <div class="form-group">
        <select name="book_status" id="">
            <option value="borrowed">Borrowed</option>
        </select>
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="user_email">Phone Number</label>
        <input type="number" class="form-control" name="phone_number">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" value="Add User" name="create_user" type="submit">
    </div>

</form>


      <div class="container-fluid">
        <h1 class="mt-4"></h1>

      </div>

    </div>
    <!-- /#page-content-wrapper -->
<?php include "includes/footer.php";?>
