<!--นส.จิณณรัตน์ รินทรทา 5821602564-->
<?php 
    session_start();
    session_unset(); //ลบตัวแปรทั้งหมด
    session_destroy(); //ทำลายเซสชั่น
    header( "location: index.php" );
    exit(0);
?>