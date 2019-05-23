<!--นส.จิณณรัตน์ รินทรทา 5821602564-->
<?php 
   include 'connect.php';
   session_start();

    $sub     = '';
    $detail  = '';
    $group   = '';
    $id      = '';

    if($_POST['subject']!= "" &&  $_POST['detail'] != "" && $_POST['group'] != ""){
        $sub    = $_POST['subject'];
        $id     = $_SESSION['id'];
        $detail = $_POST['detail'];
        $group  = $_POST['group'];
        $sql = "insert into post (title,content,post_date,cat_id,user_id) VALUES ('$sub','$detail',NOW(),'$group','$id')";
            if ($conn->query($sql) === TRUE) {
                header('Location:newpost.php?check=success');
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }else{
            header('Location:newpost.php?check=fail');
    }
?>