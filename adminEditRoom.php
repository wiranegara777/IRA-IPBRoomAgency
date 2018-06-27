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
    $crud = new Crud();
     
    $id_room = $_GET['id'];

    $room = new Room($id_room);

?>
<html lang="en">
<title>Admin Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
<script src="https://use.fontawesome.com/3e9b86115e.js"></script>
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
    <script>
$( function() {
 $( "#datepicker" ).datepicker();
} );
</script>
 <script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

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
    <a href="admin_dash.php" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
    <a href="admin_dash.php" class="w3-bar-item w3-button w3-padding w3-blue"><i class="fa fa-users fa-fw"></i>  Overview</a>
    <a href="adminListMessage.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>  Message</a>
    <a href="proses/logout.php" class="w3-bar-item w3-button w3-padding"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> logout </a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<!-- alert succes login -->
<div class="alert alert-success alert-dismissible fade show" role="alert">
            Succesfully Logged in!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
</div>
  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-tachometer-alt"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-padding">
    <h3>Edit Room</h3>

            <div class="formasik"><div class="w3-container w3-card-4 w3-padding">

                <div class="formasik">
                    <form role="form" method="post" action="proses/adminEditRoomProses.php" enctype="multipart/form-data">

                        <label>Room Title</label>
                        <input name="title" type="text" class="form-control" placeholder="Enter Title" value="<?php echo $room->getTitle(); ?>"></br>

                        <label>Location</label>
                        <input name="address" type="text" class="form-control" placeholder="Enter Address" value="<?php echo $room->getAddress(); ?>">

                        <label>fasilitas</label>
                        <input name="fasilitas" type="text" class="form-control" placeholder="AC,Proyektor,Kursi" value="<?php echo $room->getFasilitas(); ?>">

                        <label>fakultas</label>
                        <input name="fakultas" type="text" class="form-control" placeholder="FMIPA" value="<?php echo $room->getFakultas(); ?>">

                        <label>kapasitas</label>
                        <input name="kapasitas" type="number" class="form-control" placeholder="200" value="<?php echo $room->getKapasitas(); ?>">
                        
                        <label>Price</label>
                        <input name="price" type="number" class="form-control" placeholder="200000" value="<?php echo $room->getPrice(); ?>">

                        <input type="hidden" name="id_room" value="<?php echo $room->getId_room(); ?>">
                    </br></br>


                        <label>Room Description</label>
                        <textarea class="ckeditor" id="body" name="body" placeholder="Enter Description Event">
                            <?php echo $room->getBody(); ?>
                        </textarea>
                        </br>
                        <script>
                            CKEDITOR.replace( 'body' );
                        </script>

                            <label>Insert Image</label></br>
                                <input type="hidden" name="size" value"1000000">
                                <input type="file" name="image">
                            </br>

                            <label>Insert Image2</label></br>
                                <!-- <input type="hidden" name="size" value"1000000"> -->
                                <input type="file" name="image2">
                            </br>

                            <label>Insert Image3</label></br>
                                <!-- <input type="hidden" name="size" value"1000000"> -->
                                <input type="file" name="image3">
                            </br>
                            <center>
                            <label>
                            Klik Lokasi Ruangan pada Map untuk mendapatkan latitude dan longitude </label>
                            <div id="map" style="width:85%; height:350px; border:2px solid #00ff00;"></div>
                            </center>
                            <div class="input-field col s6">
                            <i class="fa fa-map prefix"></i>
                            <input style="width:30%;" type="text" name="lat" id="lat" value="<?php echo $room->getLat(); ?>">
                            <label class="item" for="latpost">Latitude</label>
                            </div>
                            <div class="input-field col s6">
                            <i class="fa fa-map prefix"></i>
                            <input style="width:30%;" type="text" name="long" id="long" value="<?php echo $room->getLng(); ?>">
                            <label class="item" for="long">Longitude</label>
                            </div>

                            <script type="text/javascript">
                                        function initMap() {
                                        var bogor = {lat: <?php echo $room->getLat(); ?>, lng: <?php echo $room->getLng(); ?>};
                                        var map = new google.maps.Map(document.getElementById('map'), {
                                            center: bogor,
                                            scrollwheel: false,
                                            zoom: 12
                                        });
                                        google.maps.event.addListener(map, 'click', function(event){
                                            document.getElementById('lat').value = event.latLng.lat();
                                            document.getElementById('long').value = event.latLng.lng();
                                        });
                                        }
                                    </script>
                                    <script async defer
                                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDeTMHQ3sm7_RXFEBlAbVRrHwCH6sOTSUU&callback=initMap">
                                    </script>

                    <button name="submit" class="w3-blue w3-button w3-block" type="submit"> Submit </button>


                    </form>
            </div>

            </div>

  </div>


 </div>
  

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
