<?php
include "db.php";
function confirm($query){
    global $connection;
    if(!$query){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}

function search_query($query){
    $count = mysqli_num_rows($query);
    if($count === 0){
        echo "<h1 class='text-center'>NO RESULT</h1>";
    }else{
        while($row = mysqli_fetch_assoc($query)){
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
            echo "<td><a href='index.php?return={$user_id}'>Returned</a></td>";
            echo "<td><a href='index.php?borrow={$user_id}'>Borrowed</a></td>";
            echo "<td><a href='index.php?source=delete&delete={$user_id}'>Delete</a></td>";
            echo "<td><a href='add_book.php?source=add_book&add_book={$person_id}'>Add Book</a></td>";
            echo "</tr>";
        }
    }
}

function block(){
    session_start();
  if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
    header("Location: login.php");
}
}

?>