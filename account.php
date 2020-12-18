<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cmail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
<div class="container">
        <a href="main.php" class="navbar-brand">Cmail</a>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="index.php" class="nav-link">create account</a></li>
        </ul>
</div>    
</nav>

<div class="container mx-auto mt-5 mx-auto"> 
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body bg-gray">
                    <form method="post" action="account.php">

                        
                        <div class="mb-3"><label for="">gmail:</label>
                        <input type="text" name="email" placeholder="Enter your gmail... " class="form-control">
                        </div>
                        
                        <div class="mb-3">
                        <label for="">Password:</label>
                        <input type="password" name="password" placeholder="Enter your password... "class="form-control">
                        </div>
                        
                        <div class="mb-3 justify-content-center d-flex">
                        <input type="submit" name="login" value="Login" class="btn btn-success w-100% mt-2 mx-auto">
                        </div>
                        

                    </form>

                    <?php

                    if(isset($_POST['login'])){
                        $email=$_POST['email'];
                        $password = $_POST['password'];
                        $query = mysqli_query($connect,"select * from accounts where email= '$email' AND password='$password'");
                        $count = mysqli_num_rows($query);

                        if($count>0){
                            $_SESSION['user'] = $email;
                            redirect("main");
                        }
                        else{
                            echo "<script>alert('user_name and Password is incorrect')</script>";
                        }  
                    }
                    
                    ?>      
              

                </div>
            </div>
        </div>
    </div>

</div>


</body>

</html>