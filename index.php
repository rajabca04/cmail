<?php include "config.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cmail</title>
    <!-- Bootstrap only -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a href= "main.php" class="navbar-brand">cmail</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="account.php" class="nav-link">Login</a></li>
        </ul>
    </div>    
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-9"></div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="">email...</label>
                            </div> 
                            <div class="mb-3">
                                <label for="">name</label>
                                <input type="text" name="name" class="form-control">
                            </div> 
                            <div class="mb-3">
                                <label for="">contact</label>
                                <input type="number" name="contact" class="form-control">
                            </div> 
                            <div class="mb-3">
                                <label for="">DOB</label>
                                <input type="text" name="dob" class="form-control">
                            </div> 
                            <div class="mb-3">
                                <label for="">email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit" name="create" value="Create account" class="btn btn-success w-100%">
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php

if(isset($_POST['create'])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password'];

//$cmd = "insert into accounts(name,contact,dob,email,password) value ('$name','$contact','$dob','$email','$password')";
$con_DB = mysqli_connect('localhost','root','','cmail');
$query = mysqli_query($con_DB,"INSERT INTO accounts(name,contact,dob,email,password) value ('$name','$contact','$dob','$email','$password')");
$_SESSION['user'] = $email;
redirect('main');
}
?>  