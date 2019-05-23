<!--นส.จิณณรัตน์ รินทรทา 5821602564-->
<nav class="navbar navbar-expand-lg shadow mb-3" style="background-color:rgb(219, 112, 147,0.4);">
        <div style="width:15%; min-width:0px;" ></div>
        <a class="navbar-brand text-dark" href="index.php">
            <i class="w3-xxlarge w3-spin fa fa-home"></i> Home Page
        </a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color:black;"></span>
        </button> -->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div style="width:70%; min-width:0px"></div>
            <ul class="nav navbar-nav navbar-right text-center" style="">
            <?php
                if(isset($_SESSION['id'])) {
                    echo '<li class="nav-item dropdown float-right">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="w3-xlarge fa fa-user-circle-o" aria-hidden="true"></i>
                                '. $_SESSION['name'] .'
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="logout.php" class="dropdown-item mr-1 text-center">
                                <i class="fa fa-sign-out" aria-hidden="true"></i>
                                ออกจากระบบ
                            </a>
                        </li>';
                }else{
                    echo '<li class="nav-item"><a href="login.php" class="nav-link"><i class="fa fa-key" aria-hidden="true"></i> เข้าสู่ระบบ</a></li>';
                    echo '<li class="nav-item"><a href="register.php" class="nav-link"><i class="fa fa-address-book" aria-hidden="true"></i> สมัครสมาชิก</a></li>';
                }
            ?>
            </ul>
        </div>
    </nav>
