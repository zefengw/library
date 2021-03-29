<?php
include "includes/functions.php";
date_default_timezone_set('America/New_York'); //set timezone

if(isset($_POST['create_user'])){
    $start = strtotime("now");
    $expiry_date  = mktime(0, 0, 0, date("m") + 2, date("d"), date("Y"));


}