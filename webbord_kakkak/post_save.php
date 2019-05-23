<!--นส.จิณณรัตน์ รินทรทา 5821602564-->
<?php 
   include 'connect.php';
   session_start();
   $data = '';

    if(isset($_GET['ip'])){
        $subject  = $_POST['data']; 
        $id       = $_SESSION['id']; 
        $data     = $_GET['ip'];

        $sql = "insert into comment (content,post_date, user_id,post_id) VALUES ('$subject',NOW(), '$id', '$data')";
            if ($conn->query($sql) === TRUE) {
                header('Location:post.php?check=success');
                // header('Location:post.php?data=' . $id. '&check=success' );
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }  
        }else{
            header('Location:post.php');
        }

?>