<?php
include "db.php";
function confirm($query){
    if(!$query){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}


?>