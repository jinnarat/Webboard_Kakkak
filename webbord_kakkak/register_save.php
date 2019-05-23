<?php
    include 'connect.php';
    $user       = '';
    $login      = '';
    $email      = '';
    $gender     = '';
    $password   = '';
    $role       = '';
    
    if(isset($_POST['name']) && isset($_POST['pass']) && isset($_POST['fullname']) && isset($_POST['gender']) && isset($_POST['email'])){
        $user      = $_POST['name'];
        $password   = $_POST['pass'];
        $name       = $_POST['fullname'];
        $gender     = $_POST['gender'];
        $email      = $_POST['email'];

        $sql = "Select login From user Where login='$login'";
        $sql1 = "insert into user (login,password,name,gender,email,role) VALUES ('$user', '$password', '$name','$gender','$email','m')";
        $result = $conn->query($sql);
            if (!$result) {
                echo "$conn->error";
            }else if ($result->num_rows > 0) {
                header('Location:register.php?check=fail');
                } else {
                if ($conn->query($sql1) === TRUE) {
                    header('Location:register.php?check=success');
                } else {
                    echo "Error: " . $sql1 . "<br>" . $conn->error;
                }
            }
            $conn->close();
        }
?>