<?php
  include "includes/header.php";
  include "includes/sidebar.php";
  include "includes/functions.php";
  block();
?>
<?php

  if(isset($_GET['add_book'])){
    $the_person_id = $_GET['add_book'];
    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_users)){
        $user_id =$row['user_id'];
        $person_id =$row['person_id'];
        $user_name = $row['user_name'];
        $book_title = $row['book_title'];
        $book_author = $row['book_author'];
        $book_status = $row['book_status'];
        $user_email = $row['user_email'];
        $phone_number = $row['phone_number'];
    }
  }


  if(isset($_POST['add_book'])){

    $person_id= $_POST['person_id'];
    $user_name = $_POST['user_name'];
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_status = $_POST['book_status'];
    $user_email = $_POST['user_email'];
    $phone_number = $_POST['phone_number'];

    $query = "INSERT INTO users(person_id, user_name, user_email, book_title, book_status, book_author, phone_number )";
    $query .= "VALUES('{$the_person_id}', '{$user_name}', '{$user_email}', '{$book_title}', '{$book_status}', '{$book_author}', '{$phone_number}' ) ";

    $add_book_query = mysqli_query($connection, $query);
    confirm($add_book_query);
    header("Location: index.php");
  }
?>

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
    <?php include "includes/navigation_form.php";?>
    <form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" name="user_name" value="<?php echo $user_name;?>">
    </div>

    <div class="form-group">
        <label for="post_tags">Book Titles</label>
        <input type="text" class="form-control" name="book_title" value="">
    </div>
    <div class="form-group">
        <label for="user_email">Book Authors</label>
        <input type="text" class="form-control" name="book_author" value="">
    </div>
    <div class="form-group">
        <select name="book_status" id="" value="<?php echo $book_status;?>">
            <option value="borrowed"><?php echo $book_status?></option>
        </select>
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email;?>">
    </div>
    <div class="form-group">
        <label for="user_email">Phone Number</label>
        <input type="number" class="form-control" name="phone_number" value="<?php echo $phone_number;?>">
    </div>
    <div class="form-group">
        <input class="btn btn-primary" value="Add Book" name="add_book" type="submit">
    </div>

</form>


      <div class="container-fluid">
        <h1 class="mt-4"></h1>

      </div>

    </div>
    <!-- /#page-content-wrapper -->
<?php include "includes/footer.php";?>
