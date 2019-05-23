<!--นส.จิณณรัตน์ รินทรทา 5821602564-->
<?php
    session_start();
    isset($_SESSION['id'])?header( "location: index.php" ):'';
    empty($_POST['user'])?header( "location: index.php" ):'';
    require "connect.php";
    
    $name = '';
    $pass = '';
    $role = '';
    $id   = '';

    $name = $_POST['name'];
    $pass = $_POST['pass'];

    if($_POST['name'] != "" && $_POST['pass'] !=""){
        $sql = "select * from user where login='$name' AND password='$pass'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $name = $row['login'];
              $role = $row['role'];
              $id   = $row['id'];

              if($role == "a" || $role == "m"){
                $_SESSION['name']   =  $name;
                $_SESSION['role']   =  $role;
                $_SESSION['id']     =  $id;
                header("Location:index.php");
              }else {
                $_SESSION['err'] ='1';
                header("Location:login.php");
              } 
           } 
        }else {
            header("Location: login.php?check=fail");
        }
           $conn->close();
    }else{
        header("Location: login.php?check=fail1");
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webboard KakKak</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
    <body>
        <div class="pure-u-1">
            <h1>Webboard KakKak</h1><br>
        </div>
<!--
        <div style="text-align:center;">
            เข้าสู่ระบบด้วย :<br/> ?
            Login = <//?php echo $name; ?>
            Password = <//?php echo $pass; ?>
        </div>

-->
        <div style="text-align:center;">
        <?php 
//              if($name == "admin" && $pass == "ad1234"){
// //                echo "ยินดีตอนรับคุณ ADMIN";
// //                echo "<br/>";
                
//                 $_SESSION['username'] = "admin";
//                 $_SESSION['role'] = "a";
//                  header( "location: index.php" );
                 
//             }else if($name == "member" && $pass == "mem1234"){
//                 echo "ยินดีตอนรับคุณ MEMBER";
//                 echo "<br/>";
                 
//                 $_SESSION['username'] = "member";
//                 $_SESSION['role'] = "m";
//                 header( "location: index.php" );
                 
//             }
// //            else{
// ////                echo "ชื่อบัญชีหรือรหัสผ่านไม่ถูกต้อง";
// ////                echo "<br/>";
// //                $_SESSION['username'] == "";
// //                $_SESSION['password'] == "";
// //                header( "location: login.php?err=true" );
// //             }
//             else {
//                 $_SESSION["id"] == "";
//                 $_SESSION["password"] == "";
//                 header("Location: login.php?err=true");
            
//         }
//             $_SESSION['id'] = "session_id()";
        ?>
        </div>
<!--
         <div style="text-align:center;">
            <a href="index.php" >กลับไปยังหน้าหลัก</a>
        </div>
-->
    </body>
</html>