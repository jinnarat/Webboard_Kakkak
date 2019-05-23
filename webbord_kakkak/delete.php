<!--นส.จิณณรัตน์ รินทรทา 5821602564-->
<?php
    session_start();
    include 'connect.php';

    $i = $_GET['id'];
    $result = mysqli_query($conn,"Delete from staff where id=$id");
     header("refresh: 0.3; url=show.php");

     if(isset($_GET["info"]) ){
        $data = $_GET["info"];
        $sql = "DELETE FROM post WHERE id='$data'";
        $sql1 = "DELETE FROM comment WHERE post_id='$data'";
     if (mysqli_query($conn, $sql)) {
         if (mysqli_query($conn, $sql1)) {
             header('Location:index.php');
         }else{
             echo "Error deleting record: " . mysqli_error($conn);
         }
     } else {
         echo "Error deleting record: " . mysqli_error($conn);
     }
     mysqli_close($conn);
     header('Location:index.php');
    }else{
        header('Location:index.php');
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
        <br><br>
        <div style="text-align:center;">
            <h5>ทำการลบกระทู้หมายเลข : <?php echo $i;?> แล้ว!!!</h5>
        </div>
        <br>
        <div style="text-align:center;">
            <a href="index.php" >กลับไปหน้าหลัก</a>
        </div>
    </body>
</html>
