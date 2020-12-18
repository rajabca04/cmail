<?php
    session_start();
  // include outher file into this file...

$connect= mysqli_connect('localhost','root','','cmail');


// Function decleration in PHP ...

function redirect($page){
    echo "<script>open('$page.php','_self')</script>";

}

function getuser($e=null){
    global $connect;
    if($e==null){
        $email= $_SESSION['user'];
    }
    else{
        $email = $e;
    }
    
    $query = mysqli_query($connect,"select * from accounts where email = '$email'");
    $data = mysqli_fetch_array($query);

    return $data;

}

?>