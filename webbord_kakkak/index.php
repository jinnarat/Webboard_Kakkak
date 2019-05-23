<!--นส.จิณณรัตน์ รินทรทา 5821602564-->
<?php 
    session_start(); 
    require "connect.php";
    $type=0;
    if(isset($_GET['data'])){
        $type = $_GET['data'];
    }
    
   $role = null;
   if(isset($_SESSION['role'])){
    $role = $_SESSION['role'];
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Webboard KakKak</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
    <?php include "navbar.php";?>
    <div class="container">
        <div class="row">

            <div class="col-6">
                <label for="group">หมวดหมู่ :</label>
                <select class="form-control-sm" id="types" onchange ="Select_type()">
                    <option value="0" hidden> ---ทั้งหมด---</option>
                    <option value="0" > ---ทั้งหมด---</option>
                    <option value="1" >เรื่องทั่วไป</option>
                    <option value="2" >เรื่องรียน</option>
                 </select>
            </div>
            <?php
            if(isset($_SESSION['id'])) {
                echo '<a href="newpost.php" class="btn btn-info" ><i class="fa fa-plus"></i> สร้างกระทู้</a>';
            }
        ?>
        </div>
        <br>
    </div>
    <div style="margin-left:10%;margin-right:10%;margin-top:0%;min-height: 275px; ">
         <?php
            $id         = '';
            $user_id    = '';
            $title      = '';
            $content    = '';
            $post_date  = '';
            $cat_id     = '';
            $login      = '';
        
           
           if($type ==0){
            $sql = "Select * From post order by post_date DESC";
            $result = $conn->query($sql);
            // if(isset($_GET['data'])){
            //     echo 'check';
            //     if($_GET['data'] = 0){ $sql = "Select * From post";}
            //     else if ($_GET['data'] = 1) {$sql = "Select * From post WHERE cat_id =".$_GET['data'];}
            //     else if ($_GET['data'] = 2){$sql = "Select * From post WHERE cat_id =".$_GET['data'];}
            // }
        
             if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id         = $row['id'];
                $title      = $row['title'];
                $content    = $row['content'];
                $post_date  = $row['post_date'];
                $cat_id     = $row['cat_id'];
                $user_id    = $row['user_id'];
        
                $sql1 = "select login From user where id='$user_id'";
                $result1 = $conn->query($sql1);
                
                if ($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) { 
                    $login = $row1['login'];
                   } 
                }
                if($cat_id == 1){
                    $cat_id ="เรื่องทั่วไป";
                }else if($cat_id == 2){
                    $cat_id ="เรื่องเรียน";
                }
                if(isset($_SESSION['name'])=="" ||  $role=="m"){
                    echo "<li class='list-group-item' style='background-color: rgb(23, 162, 184,0.2);'><div>
                          [$cat_id] <a href='post.php?data=$id'style='color:#CC0066;'>$title</a><br>
                          $login $post_date</div></li>";
                }else{
                    echo "<li class='list-group-item' style='background-color: rgb(23, 162, 184,0.2);'><div>
                    [$cat_id] <a href='post.php?data=$id'style='color:#CC0066'>$title</a> <a  style='float:right;' href='#' onclick='delete_data($id)' class='btn btn-danger btn-sm'>
                    <span class='fa fa-trash' ></span> 
                  </a><br>
                    $login $post_date</div></li>";
                }
              }
            } else {
            echo "ไม่มีกระทู้โว๊ย!!!!!!!";
               }
            $conn->close();
            }
          else if($type ==1){
               
            $sql = "Select * From post where cat_id=1 order by post_date DESC";
            $result = $conn->query($sql);
        
             if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id         = $row['id'];
                $title      = $row['title'];
                $content    = $row['content'];
                $post_date  = $row['post_date'];
                $cat_id     = $row['cat_id'];
                $user_id    = $row['user_id'];
        
                $sql1 = "select login From user where id='$user_id'";
                $result1 = $conn->query($sql1);
                
                if ($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc()) { 
                    $login = $row1['login'];
                   } 
                }
                if($cat_id == 1){
                    $cat_id ="เรื่องทั่วไป";
                }else if($cat_id == 2){
                    $cat_id ="เรื่องเรียน";
                }
                if(isset($_SESSION['name'])=="" ||  $role=="m"){
                    echo "<li class='list-group-item' style='background-color: rgb(23, 162, 184,0.2);'><div>
                          [$cat_id] <a href='post.php?data=$id'style='color:#CC0066;'>$title</a><br>
                          $login $post_date</div></li>";
                }else{
                    echo "<li class='list-group-item' style='background-color: rgb(23, 162, 184,0.2);'><div>
                    [$cat_id] <a href='post.php?data=$id'style='color:#CC0066'>$title</a> <a  style='float:right;' href='#' onclick='delete_data($id)' class='btn btn-danger btn-sm'>
                    <span class='fa fa-trash' ></span> 
                  </a><br>
                    $login $post_date</div></li>";
                }
              }
            } else {
            echo "ไม่มีกระทู้โว๊ย!!!!!!!";
               }
            $conn->close();
            }
            else if($type ==2){
               
                $sql = "Select * From post where cat_id=2 order by post_date DESC";
                $result = $conn->query($sql);
            
                 if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $id         = $row['id'];
                    $title      = $row['title'];
                    $content    = $row['content'];
                    $post_date  = $row['post_date'];
                    $cat_id     = $row['cat_id'];
                    $user_id    = $row['user_id'];
            
                    $sql1 = "select login From user where id='$user_id'";
                    $result1 = $conn->query($sql1);
                    
                    if ($result1->num_rows > 0) {
                    while($row1 = $result1->fetch_assoc()) { 
                        $login = $row1['login'];
                       } 
                    }
                    if($cat_id == 1){
                        $cat_id ="เรื่องทั่วไป";
                    }else if($cat_id == 2){
                        $cat_id ="เรื่องเรียน";
                    }
                    if(isset($_SESSION['name'])=="" ||  $role=="m"){
                        echo "<li class='list-group-item' style='background-color: rgb(23, 162, 184,0.2);'><div>
                              [$cat_id] <a href='post.php?data=$id'style='color:#CC0066;'>$title</a><br>
                              $login $post_date</div></li>";
                    }else{
                        echo "<li class='list-group-item' style='background-color: rgb(23, 162, 184,0.2);'><div>
                        [$cat_id] <a href='post.php?data=$id'style='color:#CC0066'>$title</a> <a  style='float:right;' href='#' onclick='delete_data($id)' class='btn btn-danger btn-sm'>
                        <span class='fa fa-trash' ></span> 
                      </a><br>
                        $login $post_date</div></li>";
                    }
                  }
                } else {
                echo "ไม่มีกระทู้โว๊ย!!!!!!!";
                   }
                $conn->close();
                }
            
           ?>
	</div>
    <footer class="bg-info shadow-sm mb-0" style="margin-top:150px">
        <h4 style="text-align:center;" class="py-4"><i class="w3-xxlarge  fa fa-mortar-board"></i> Create by นางสาว จิณณรัตน์ รินทรทา 5821602564 </h4>
    </footer>
    </body>

    <script>

    function delete_data(i) {

        var check = confirm("คุณต้องการลบ กระทู้นี้ใช่ไหน้าาา ?");
            if (check == true) {
                location.href = "delete.php?info=" + i;
            } 

        }

    function Select_type() {

        var x = document.getElementById("types").value;
        location.href = "index.php?data=" + x;
    }
</script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
</html>