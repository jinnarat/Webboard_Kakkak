<!--นส.จิณณรัตน์ รินทรทา 5821602564-->
<?php
    session_start();
//    $user = $_SESSION['username'];
//    $role = $_SESSION['role'];
//    $id   = $_SESSION['id']; 

    $name = $_SESSION['name'];
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit|Prompt" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
    <body>
        <div class="pure-u-1">
            <h1>Webboard KakKak</h1><br>
        </div>
        <?php include "navbar.php";?>

        <div class="container">
            <?php
                if($check==success){
                    echo '<div class="alert alert-success" role="alert"><i class="fa fa-smile-o"></i> เพิ่มข้อมูลสำเร็จ ~ <a href="index.php" class="alert-link">
                </div>';
                }
            ?>
            <div class="card">
            <div style="text-align:center; color:#ffff;" class="bg-info rounded-top">
                <h5 class="py-2">ตั้งค่ากระทู้ใหม่</h5>
            </div>
                <div class="card-body">
                    <form action="newpost_save.php" method="post" onsubmit="return ch_form();">
                        <div class="row">
                            <div class="col-2">
                                <label>ผู้ใช้ระบบ:</label>
                            </div>
                            <div class="col-3">
                                <?php 
                                    if(isset($_SESSION['id'])){
//                                        echo '<lable> ผู้ใช้ระบบ:&nbsp;'.$_SESSION['username'].'<lable>';
                                        echo $_SESSION['name'];
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label for="group">หมวดหมู่ :</label>
                            </div>
                            <div class="col-10">
                                <select class="form-control-sm" id="group" name="group" required >
                                    <option value="">--กรุณาเลือก--</option>
                                    <option value="1">เรื่องทั่วไป</option>
                                    <option value="2">เรื่องรียน</option>
                                 </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label>หัวข้อเรื่อง :</label>
                            </div>
                            <div class="col-10">
                                <input type="text" name="subject" id="subject"style="border radius:10px" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2">
                                <label>เนื้อหา :</label>
                            </div>
                            <div class="col-10">
                                <textarea type="text" name="detail" id="datail" required style="border radius:10px  width: 60%;"></textarea>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <button type="submit" value="บันทึก" style="margin: auto;" class="btn btn-info">
                                <i class="fa fa-save" aria-hidden="true"></i> 
                                บันทึกข้อความ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
    function ch_form(){
		var group 	= document.getElementById('group');

		if(group.value == ""){
			alert("กรุณาเลือกหมวดหมู่");
			group.focus();
			return false;
		}
	}

    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></scri
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</html>