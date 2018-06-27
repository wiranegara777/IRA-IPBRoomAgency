<!DOCTYPE html>
<?php 
    session_start();

    include_once("classes/Crud.php");
    include_once("classes/Mahasiswa.php");
    include_once("classes/Admin.php");
    include_once("classes/Room.php");
    include_once("classes/Order.php");
    include_once("classes/Pj.php");

    $ID_ORDER = $_GET['id'];

    if(isset($_SESSION['name'])) {
         $admin = new Admin($_SESSION['id'],$_SESSION['name'],$_SESSION['email'],$_SESSION['phone']);
    }else{
        echo '<script language="javascript">';
        echo 'alert("You Must Login First")';  //not showing an alert box.
        echo '</script>';
        echo '<script>document.location.href="login.html";</script>';
    }
    $crud = new Crud();
     
    $order = new Order($ID_ORDER);
    $Mahasiswa = new Mahasiswa($order->getId_user());
    $room = new Room($order->getId_room());
    $pj = new Pj($order->getId_pj());

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
    <a href="adminListMessage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Message</a>
    <a href="proses/logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> logout </a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
  <h5><b><i class="fa fa-tachometer-alt"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-padding">
    <h3> Detail Order </h3>
    <div class="row">
      <div class="col-8">
          <ul class="list-group list-group-flush">
              <li class="list-group-item">
                  <div class="row">
                <div class="col-5">Nomor Order</div>
                <div class="col">:</div>
                <div class="col-6"><?php echo $order->getId_order(); ?></div>
                </div>
              </li>
              <li class="list-group-item">
                  <div class="row">
                <div class="col-5">Nama Ruangan</div>
                <div class="col">:</div>
                <div class="col-6"><?php echo $room->getTitle(); ?></div>
                </div>
              </li>
              <li class="list-group-item">
                  <div class="row">
                <div class="col-5">Lokasi Ruangan</div>
                <div class="col">:</div>
                <div class="col-6"><?php echo $room->getAddress(); ?></div>
                </div>
              </li>
              <li class="list-group-item">
                  <div class="row">
                <div class="col-5">Kapasitas Ruangan</div>
                <div class="col">:</div>
                <div class="col-6"><?php echo $room->getKapasitas(); ?> Orang</div>
                </div>
              </li>
              <li class="list-group-item">
                  <div class="row">
                <div class="col-5">Fasilitas</div>
                <div class="col">:</div>
                <div class="col-6"><?php echo $room->getFasilitas(); ?></div>
                </div>
              </li>
              <li class="list-group-item">
                  <div class="row">
                <div class="col-5">Nama PJ Ruangan</div>
                <div class="col">:</div>
                <div class="col-6"><?php echo $pj->getName(); ?></div>
                </div>
              </li>
              <li class="list-group-item">
                  <div class="row">
                <div class="col-5">Nama Pemesan</div>
                <div class="col">:</div>
                <div class="col-6"><?php echo $Mahasiswa->getName(); ?></div>
                </div>
              </li>
              <li class="list-group-item">
                  <div class="row">
                <div class="col-5">NIM / NRP</div>
                <div class="col">:</div>
                <div class="col-6"><?php echo $Mahasiswa->getNim(); ?></div>
                </div>
              </li>
              <li class="list-group-item">
                  <div class="row">
                <div class="col-5">Tanggal Sewa</div>
                <div class="col">:</div>
                <div class="col-6"><?php echo $order->getTgl(); ?> - <?php echo $order->getMonth();?> - <?php echo $order->getYear(); ?></div>
                </div>
              </li>
              <li class="list-group-item">
                  <div class="row">
                <div class="col-5">Total Pembayaran</div>
                <div class="col">:</div>
                <div class="col-6">Rp. <?php echo $order->getSum_price(); ?>,-</div>
                </div>
              </li>
              <li class="list-group-item">
                  <div class="row">
                <div class="col-5">Jenis Pembayaran</div>
                <div class="col">:</div>
                <div class="col-6"><?php echo $order->getPayment(); ?></div>
                </div>
              </li>

              <li class="list-group-item">
                  <div class="row">
                <div class="col-5">Status</div>
                <div class="col">:</div>
                <div class="col-6"><?php echo $order->getStatus(); ?></div>
                </div>
              </li>

            </ul>
      
            <?php if($order->getBukti() == "null") {?>
                    
                <h3>Belum Ada Bukti Bayar</h3>
                <?php } else { ?>
                    <h3>Bukti Bayar</h3>
                    <img src="<?php echo $order->getBukti();?>" style="height: 450px;">
            <?php } ?>
            </br>
            <?php if($order->getStatus() == "buying") { ?>
            <h3>Konfirmasi Pembayaran</h3>
                <a href="proses/updateStatusOrder.php?id=<?php echo $ID_ORDER; ?>"><button class="btn btn-info tombol" type="submit" name="submit" style="margin-top: 10%; margin-left: 55%">Konfirm Pembayaran</button></a>
            <?php } ?>

      </div>
      

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
