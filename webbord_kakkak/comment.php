<!--นส.จิณณรัตน์ รินทรทา 5821602564-->
<?php
include "connect.php";
session_start();
$user_id = $_SESSION['user_id'];
$content = addslashes($_POST['comment']);
$post_id = $_POST['post_id'];

if ($content!="" && $post_id!="") {
    $result = mysqli_query($conn, "Insert Into comment (content, post_date, user_id, post_id) values ('$content', NOW(), '$user_id', '$post_id')");
    if ($result) {
        header('location: post.php?id=' . $post_id);
        exit(0);
    }else {
        header('location: post.php?id=' . $post_id. '&status=fail&message=' . mysqli_error($conn) . "&data=".$content . $user_id . $post_id);
    }
}else {
    header('location: post.php?status=fail&id=' . $post_id);
}