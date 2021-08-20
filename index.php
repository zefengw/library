<?php
  include "includes/header.php";
  include "includes/sidebar.php";
  include "includes/functions.php";
  block();
?>

    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">
    <?php include "includes/navigation.php";?>
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
          <th>ID</th>
          <th>Person ID</th>
          <th>Name</th>
          <th>Book Titles</th>
          <th>Book Authors</th>
          <th>Book Status</th>
          <th>Email</th>
          <th>Phone Number</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $query = "SELECT * FROM users";
            $select_users = mysqli_query($connection, $query);
            while($row = mysqli_fetch_array($select_users)){
              $user_id = $row['user_id'];
              $person_id = $row['person_id'];
              $user_name = $row['user_name'];
              $user_email = $row['user_email'];
              $book_title = $row['book_title'];
              $book_author = $row['book_author'];
              $book_status = $row['book_status'];
              $phone_number = $row['phone_number'];

              echo "<tr>";
              echo "<td>$user_id</td>";
              echo "<td>$person_id</td>";
              echo "<td>$user_name</td>";
              echo "<td>$book_title</td>";
              echo "<td>$book_author</td>";
              echo "<td>$book_status</td>";
              echo "<td>$user_email</td>";
              echo "<td>$phone_number</td>";
              echo "<td><a href='edit_user.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
              echo "<td><a href='index.php?source=delete&delete={$user_id}'>Delete</a></td>";
              echo "<td><a href='add_book.php?source=add_book&add_book={$person_id}&email=$user_email'>Add Book</a></td>";
              echo "</tr>";

            }
            if(isset($_GET['delete'])){
              $the_user_id = $_GET['delete'];
              $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
              $delete_user_query = mysqli_query($connection, $query);
            }
          ?>
        </tbody>
      </table>


      <div class="container-fluid">
        <h1 class="mt-4"></h1>

      </div>

    </div>
    <!-- /#page-content-wrapper -->
<?php include "includes/footer.php";?>
