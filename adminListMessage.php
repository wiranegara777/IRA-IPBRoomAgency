<!DOCTYPE html>
<?php 
    session_start();

    include_once("classes/Crud.php");
    include_once("classes/Mahasiswa.php");
    include_once("classes/Admin.php");
    include_once("classes/Room.php");
    include_once("classes/Order.php");
    include_once("classes/Pj.php");

    if(isset($_SESSION['name'])) {
        $admin = new Admin($_SESSION['id'],$_SESSION['name'],$_SESSION['email'],$_SESSION['phone']);
    }else{
       echo '<script language="javascript">';
       echo 'alert("You Must Login First")';  //not showing an alert box.
       echo '</script>';
       echo '<script>document.location.href="login.html";</script>';
    }

    $id = $_SESSION['id'];

    $crud = new Crud();
    $student = new Mahasiswa($id);
    $Mahasiswa = new Mahasiswa($id);
    if ($student->getLevel() == 2)
        $query = "SELECT * FROM message where id_user = $id GROUP by id_pj,id_user";
    else    
        $query = "SELECT * FROM message where id_pj = $id GROUP by id_pj,id_user";

    $result = $crud->getData($query);

?>
<html lang="en">
<title>Admin Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<style type="text/css">
        .row-section{float:left; width:100%;
        }
        .row-section h2{float:left; width:100%; margin-bottom:30px; font-size: 14px;}
        .row-section h2 span{display:block; font-size:45px; text-transform:none; margin-bottom:20px; margin-top:30px;font-weight:700;}
        .row-section .row-block{padding:1px; margin-bottom:250px;}
        .row-section .row-block ul{margin:0; padding:0;}
        .row-section .row-block ul li{list-style:none; margin-bottom:10px;}
        .row-section .row-block ul li:last-child{margin-bottom:0;}
        .row-section .row-block ul li:hover{cursor:grabbing; background-color: #008B8B; color: #FFFF;}
        .row-section .row-block .media{border:1px solid #d5dbdd; padding:5px 200px; border-radius: 5px; box-shadow:0px 2px 1px rgba(0,0,0,0.04); background:#fff;}
        .row-section .media .media-body h4 {font-size: 18px; font-weight: 600; margin-bottom: 10; padding-left: 15px; margin-top:10px;}
        a.list-group-item:hover{
          background-image: linear-gradient(bottom, rgb(0, 109, 109) 0%, rgb(0,159,159) 100%);
          background-image: -o-linear-gradient(bottom, rgb(0, 109, 109) 0%, rgb(0,159,159) 100%);
          background-image: -moz-linear-gradient(bottom, rgb(0, 109, 109) 0%, rgb(0,159,159) 100%);
          background-image: -webkit-linear-gradient(bottom, rgb(0, 109, 109) 0%, rgb(0,159,159) 100%);
          background-image: -ms-linear-gradient(bottom, rgb(0, 109, 109) 0%, rgb(0,159,159) 100%); 
          background-image: -webkit-gradient(
              linear,
              left bottom,
              left top,
              color-stop(0, rgb(0, 109, 109)),
              color-stop(1, rgb(0, 159, 159))
              );
          -webkit-text-fill-color: white;
          }
  </style>
<body class="w3-light-grey">

<!-- bootstrap css -->
<link rel="stylesheet" href="css/bootstrap.min.css">

<!-- font awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
<!--  bootstrap js -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
  <a href="index.php"><span class="w3-bar-item w3-right">Logo</span></a>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="/w3images/avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo $admin->getName(); ?></strong></span><br>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="admin_dash.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="proses/logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> logout </a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <div class="w3-padding">
    
    <h3>Message List</h3>

        <section class="row-section">
    <div class="container utama" style="margin-top: 1cm;">
    
            <ul class="list-group">

            <?php if($result->num_rows > 0){ 

                while($res = mysqli_fetch_array($result)) { 
                    $mahasiswa = new Mahasiswa($res['id_user']);
                    $pj = new Pj($res['id_pj']);   

                    if($student->getLevel() == 2){
                        $nama_sender = $pj->getName();
                        $chat = $res['conversation'];
                        $id = $res['id_pj'];
                    }else{
                        $nama_sender = $mahasiswa->getName();
                        $chat = $res['conversation'];
                        $id = $res['id_user'];
                    }   
                ?>

                 <a href='adminMessage.php?id_pj=<?php echo $id;?>' class="list-group-item" style="color: #008B8B;">
                   <div class="row justify-content-center" style="width: 100%; margin-left: 12px;">
                        <div class="col-1">
                            <i class="fas fa-user fa-3x" style="color: #008B8B;"></i>
                            </div>
                            <div class="col-11" >
                              <div class="container" style="padding-left: 7px;">
                                <div class="row">
                                <div  class="col-11"><?php echo $nama_sender; ?></div>
                                <div class="col-1"><?php echo $res['dates']; ?></div>
                                </div>
                                <div class="row">
                                  <div></div>
                                </div>
                                <div class="row">
                                <div class="col-11"><?php echo $chat; ?></div>
                                <!-- <div class="col-1">3</div> -->
                                </div>
                                </div>
                                </div>
                                </div>
              </a>
            <?php } //tutup while           
        } else { echo "Tidak Memiliki Chat"; } ?>  

      </ul>        
    </div></section>
        
      
  </div>

 </div>
  <hr>
  

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>

<script>
// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>


<script>
    (function(d, w, c) {
        w.ChatraID = 'Nz3kSZ4tF5JhEjgMy';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = (d.location.protocol === 'https:' ? 'https:': 'http:')
        + '//call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
</script>
<!-- /Chatra {/literal} -->

</body>
</html>
