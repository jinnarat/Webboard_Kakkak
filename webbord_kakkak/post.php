<!--นส.จิณณรัตน์ รินทรทา 5821602564-->
<?php
    session_start();
    // empty($_GET['id'])?header( "location: index.php" ):'';
    include 'connect.php';
    $post = $_GET['id'];

    if(isset($_GET['check'])){
        $check = $_GET['check'];
    }
       if(isset($_GET["data"]) ){
        $data = $_GET["data"];
    }else{
        header("Location: index.php");
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
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
    <body>
    <div class="pure-u-1">
            <h1>Webboard KakKak</h1>
    </div>

    <?php include "navbar.php";?>

    
    <!-- <div class="container">

    </div> -->
    <?php
        if($check==success){
            echo '<div class="alert alert-success" role="alert"><i class="fa fa-smile-o"></i> เพิ่มความคิดถึง เห้ย ความคิดเห็นแล้ว ~ <a href="post.php" class="alert-link">
        </div>';
            }else if($check==fail && $check!=''){
            echo '<div class="alert alert-danger" role="alert"> <a href="register.php" class="alert-link">
        </div>';
        }
    ?>
    <div class="row" style="margin:auto;margin-left:30%;border:2px solid #FF6347;width:40%;border-radius: 15px">
            <?php 
            
                $title      = '';
                $content    = '';
                $post_date  = '';
                $login      = '';
                $id         = '';

                // $user_id    = $row['user_id'];  
                // $title      = $row['title'];
                // $content    = $row['content'];
                // $post_date  = $row['post_date'];

                $sql = "Select * From post where id='$data' ";
                    $result = $conn->query($sql);
                
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                        $user_id    = $row['user_id'];  
                        $title      = $row['title'];
                        $content    = $row['content'];
                        $post_date  = $row['post_date'];

                        $sql1 = "select login From user where id='$user_id'";
                        $result1 = $conn->query($sql1);
                        
                        if ($result1->num_rows > 0) {
                        while($row1 = $result1->fetch_assoc()) { 
                            $login = $row1['login'];
                        } 
                    }
              }
                }else{
                    header("Location: index.php");
                } 
            ?>

        <div style="color:white;width:100%;padding-left:20px;padding-top:1%;padding-bottom:1%;border-radius: 10px 10px 0px 0px;background-color:#CC6666;">
				<?php echo "$title" ?>
			</div>
        <div style="padding-left:20px;padding-top:1%;padding-bottom:1%;">
            <?php echo "$content<br> $login  $post_date" ?>
        </div>
	</div>

		<?php
           $c_id            = '';
           $c_subject       = array();
           $c_post_date     = array();
           $c_user_id       = '';
           $c_arry_name     = array();

           $sql3 = "Select * from comment where post_id =$data ORDER BY post_date ASC";
           $result3 = $conn->query($sql3);
               if ($result3->num_rows > 0) {
                    $c = 0;
                    $i =0;
                    while($row = $result3->fetch_assoc()) {
                        $c_id               = $row['id'];
                        $c_subject[$c]      = $row['content'];
                        $c_post_date[$c]    = $row['post_date'];
                        $c_user_id          = $row['user_id'];

                        $sql1 = "select login From user where id='$c_user_id'";
                        $result4 = $conn->query($sql1);
                    
                        if ($result4->num_rows > 0) {
                            while($row1 = $result4->fetch_assoc()) { 
                                $c_arry_name[$i] = $row1['login'];
                            } 
                        }
                            $c = $c +1;
                            $b = $b+1;
                            $i = $i+1;
                    }
                }
        ?>

		<?php 
            if($c_id != null){
                
                for($a=0;$a<$b;$a++){
                echo    "<div class='row' style='margin:auto;margin-top:1%;margin-left:30%;border:2px solid rgb(23, 162, 184,0.3);width:40%;border-radius: 15px;'>
                            <div style='padding-left:20px;width:100%;background-color: rgb(23, 162, 184,0.2);padding-top:1%;padding-bottom:1%;border-radius: 15px 15px 0px 0px;'>
                                <label>ความคิดเห็นที่ ".($a+1)." </label>
                            </div>
                            <div style='padding-left:20px;padding-top:1%;padding-bottom:1%;'>
                            $c_subject[$a]<br>
                            $c_arry_name[$a] $c_post_date[$a]
                            </div>
                        
                        </div>";
                }        
            }       
 
        ?>

		<?php 
            if(isset($_SESSION['name'])){
                echo  "<form method='post' action='post_save.php?ip=$data'>
                            <div class='row' style='margin:auto;margin-top:1%;margin-left:30%;border:2px solid #17a2b8;width:40%;border-radius: 10px'>
                                <div style='padding-left:20px;width:100%;color:white;background-color:#17a2b8;padding-top:1%;padding-bottom:0%;border-radius: 10px 10px 0px 0px;'>
                                    <label >แสดงความคิดเห็น</label>
                                </div>
                    
                                <div class='col' style='margin-top:1%;''>
                                    <textarea style='width:100%;border-radius: 10px' name='data' required></textarea>
                                    <div class='row mt-2'>
                                            <button  value='ส่งข้อความ' style='margin: auto; margin-left: 40%;' class='btn btn-info'>
                                                <i class='fa fa-paper-plane' ></i> ส่งข้อความโล๊ด
                                            </button>
                                    </div><br>
                                    <div>
                                        <a style='margin:auto; margin-left: 40%; color:#17a2b8;' href='index.php' >กลับไปยังหน้าหลัก</a>
                                    </div><br>
                            </div>
                        </form> ";
            }
        ?>

	</div>
        
    </body>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></scri
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</html>