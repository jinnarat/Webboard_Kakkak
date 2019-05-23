<!--นส.จิณณรัตน์ รินทรทา 5821602564-->
<?php
    session_start();
    require 'connect.php';

    if(isset($_SESSION['name'])){
        header("Location: index.php");
      }

    $error = '';
    if(isset($_SESSION['err'])){
      $err = $_SESSION['err'];
    }
    $check = '';
    if(isset($_GET['check'])){
       $check = $_GET['check'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webboard KakKak</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="pure-u-1">
        <h1>Webboard KakKak</h1>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow mb-3">
        <div style="width:15%; min-width:0px;" ></div>
        <a class="navbar-brand text-dark" href="index.php"><i class="w3-xxlarge w3-spin fa fa-home" aria-hidden="true"></i> Home Page</a>
    </nav>

    <div class="container">
        <?php
            if($error){
                echo '<div class="alert alert-danger" role="alert">ไม่มีข้อมูลสมาชิก กรุณาสมัครสมาชิก!<a href="login.php" class="alert-link">
                </div>';
                session_destroy();
             }
             if($check == fail){
                echo '<div class="alert alert-danger" role="alert">username และ password ผิดพลาด <a href="login.php" class="alert-link">
                </div>';
                session_destroy();
             }else if($check == fail1){
                echo '<div class="alert alert-danger" role="alert">กรุณากรอก username และ password  <a href="login.php" class="alert-link">
                </div>';
                session_destroy();
             }
        ?>
        <div class="card">
            <div style="text-align:center; color:#ffff;" class="bg-info rounded-top">
                <h5 class="py-2">Login</h5>
            </div>
            <div class="card-body">
                <form action="verify.php" method="post">
                  <div class="form-group">
                      <label for="name"><span class="under">Username:</span></label>
                    <input type="text" class="form-control" name="name" id="name">
                  </div>
                  <div class="form-group">
                      <label for="pass"><span class="under">Password:</span></label>
                    <input type="password" class="form-control" name="pass" id="pass" >
                  </div>
                  <div class="register" style="text-align:center;">
                      ถ้ายังไม่ได้สมัครสมาชิก <a href="register.php" style="color:#CC0066;"><i class="fa fa-user-plus"></i>กรุณาสมัครสมาชิก</a>
                  </div>
                    <div style="text-align:center; margin:auto; margin-top:10px;">
                        <input type="submit" value="Submit" style="margin: auto;" class="btn btn-info">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>