<!--นส.จิณณรัตน์ รินทรทา 5821602564-->
<?php
    session_start();
    isset($_SESSION['name']) ? header("location: index.php") : '';
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
                if($check==success && $check!=''){
                    echo '<div class="alert alert-success" role="alert"><i class="fa fa-smile-o"></i> เพิ่มข้อมูลสำเร็จ <a href="index.php" class="alert-link">
                </div>';
                  }else if($check==fail && $check!=''){
                    echo '<div class="alert alert-danger" role="alert">ชื่อบัญชีซ้ำกรุณากรอกใหม่ <a href="register.php" class="alert-link">
                </div>';
                }
            ?>
        <div class="card">
            <div style="text-align:center; color:#ffff;" class="bg-info rounded-top">
                <h5 class="py-2">สมัครสมาชิก</h5>
            </div>
            <div class="card-body">
                <form method="post" action=register_save.php>
                    <div class="form-group">
                        <label for="usn">ชื่อบัญชี :</label>
                        <input type="text" class="form-control" name="name" placeholder="กรอกไม่เกิน 10 ตัวอักษร/ตัวเลข" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label>รหัสผ่าน :  </label>
                        <input type="password" class="form-control" name="pass" placeholder="กรอกรหัสผ่านที่ต้องการ" required>
                    </div>
                    <div class="form-group">
                        <label for="name">ชื่อ-นามสกุล :  </label>
                        <input type="text" class="form-control" name="fullname" placeholder="กรอกรหัสผ่านที่ต้องการ" required>
                    </div>
                    <div class="form-row required">
                        <div class="form-group col-md-2">
                            <label>เพศ :  </label>
                            <select name="gender" class="form-control form-control-sm">
                                <option value="m">ชาย</option>
                                <option value="f">หญิง</option>
                                <option value="o">อื่น</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>email : </label>
                        <input type="email" class="form-control" name="email" placeholder="กรุณากรอกอีมลล์"  required>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <input type="submit" value="สมัครสมาชิก" style="margin: auto;" class="btn btn-info">
                        </div>
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