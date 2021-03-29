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
        if(isset($_POST['book_search']) && !empty($_POST['search_bar']) && !empty($_POST['select'])){
            $search_bar = $_POST['search_bar'];
            $search = $_POST['select'];
            switch($search){
                case "user":
                    $query = "SELECT * FROM users WHERE user_name LIKE '%$search_bar%' ";
                    $search_query_user = mysqli_query($connection, $query);
                    confirm($search_query_user);
                    search_query($search_query_user);
                break;
                case "person_id":
                    $query = "SELECT * FROM users WHERE person_id LIKE '%$search_bar%' ";
                    $search_query_id = mysqli_query($connection, $query);
                    confirm($search_query_id);
                    search_query($search_query_id);
                break;
                case "title":
                    $query = "SELECT * FROM users WHERE book_title LIKE '%$search_bar%' ";
                    $search_query_title = mysqli_query($connection, $query);
                    confirm($search_query_title);
                    search_query($search_query_title);
                break;
                case "author":
                    $query = "SELECT * FROM users WHERE book_author LIKE '%$search_bar%' ";
                    $search_query_author = mysqli_query($connection, $query);
                    confirm($search_query_author);
                    search_query($search_query_author);
                break;
            }
        }else{
            if(empty($_POST['search_bar'])){
                echo "<h3 class='text-center'>Please Input Something</h3>";
            }else{
                echo "<h3 class='text-center'>Please Select a Category</h3>";
            }
        }

            if(isset($_GET['return'])){
              $the_user_id = $_GET['return'];
              $query = "UPDATE users SET book_status = 'returned' WHERE user_id = {$the_user_id} ";
              $change_return_query = mysqli_query($connection, $query);
              header("Location: ./index.php");
            }
            if(isset($_GET['borrow'])){
              $the_user_id = $_GET['borrow'];
              $query = "UPDATE users SET book_status = 'borrowed' WHERE user_id = {$the_user_id} ";
              $change_borrow_query = mysqli_query($connection, $query);
              header("Location: ./index.php");
            }
            if(isset($_GET['delete'])){
              $the_user_id = $_GET['delete'];
              $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
              $delete_user_query = mysqli_query($connection, $query);
              header("Location: ./index.php");
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
