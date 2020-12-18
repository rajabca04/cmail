<!DOCTYPE html>
<?php
include "config.php";
if(!isset($_SESSION['user'])){
    redirect('account');
}
$user= getuser();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cmail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light py-3">
        <div class="container">
            <a href="" class="navbar-brand">Cmail</a>

            <form action="" class="d-flex mx-auto">
                <input type="text" name="search" placeholder="search your mail..." class="form-control" size="70" style="border-radus:0px;">
                <input type="submit" name="find" value="Search"  class="btn btn-outline-danger"style="margin-left:-74px;">           
            </form>
            <ul class="navbar-nav">
            <?php if(isset($_SESSION['user'])):?>
                <!--
                <li class="nav-item"><a href="" class="nav-link">Home</a></li>
                 User name display on main page -->
                <li class="nav-item"><a href="" class="nav-link" style="color:green; font-size:20px;"><b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path fill-rule="evenodd" d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683z"/>
  <path d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"/>
</svg>  <?= $user['name'];?></b></a></li>
                <?php else: ?>
                <li class="nav-item"><a href="account.php" class="nav-link"><button class="btn btn-primary">Sign In</button></a></li>
                <li class="nav-item"><a href="index.php" class="nav-link"><button class="btn btn-success">Sign Up</button></a></li> 
                    <?php endif;?>
            </ul>
        </div>
    </nav>

    <div class="container-fluid mt-2">
        <button data-bs-target="#insert" data-bs-toggle="modal" class="btn btn-danger btn-lg px-5 mt--2 ml-2">Compose</button>
        <div class="row mt-2">      
            <div class="col-lg-2">

                    <?php include "compose_form.php" ?>

                    <div class="list-group list-group-flush ">
                        <a href="main.php" class="list-group-item list-group-item-action">inbox</a>
                        <a href="sentmail.php" class="list-group-item list-group-item-action">sent mail</a>
                        <a href="" class="list-group-item list-group-item-action">draft</a>
                        <a href="" class="list-group-item list-group-item-action">trash</a>
                        <a href="logout.php" class="list-group-item list-group-item-action bg-danger text-white">Logout</a>
                </div>
            </div> 
        <div class="col-lg-10">
            <?php  
            $user_id = getuser();
            $id  = $user_id['id'];
            $calling = mysqli_query($connect,"select * from mail JOIN accounts ON mail.send_to=accounts.id where send_by='$id'");

            while($x = mysqli_fetch_array($calling)):?>
                <div class="row">
                    <div class="col-1"><input type="checkbox"></div>
                    <div class="col-1"><a href=""><b><?= $x['name'] ?></b></a></div>
                    <div class="col-2 font-weight-bold" style="color:red;"><?= $x['subject'] ?></div>
                    <div class="col"style="color:dark;" ><?= $x['body'] ?></div>
                </div>
                <hr class="m-2">
            <?php endwhile;?>
        </div>      
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>  

</body>
</html>