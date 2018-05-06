<!DOCTYPE html>
<?php
session_start();
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Mahasiswa.php");
include_once "classes/Room.php";
include_once "classes/Pj.php";
include_once "classes/order.php";

if(isset($_SESSION['name'])) {
 // echo "Your session is running " . $_SESSION['name'];    
     $Mahasiswa = new Mahasiswa($_SESSION['id']);
    // echo "Your session is running " . $Mahasiswa->getName();
}else{
    echo '<script language="javascript">alert("Please Login First");</script>'; 
    echo '<script>document.location.href="login.php";</script>';
}

//session_id
$id = $_SESSION['id'];
$crud = new Crud();

?>
<html lang="en">
<head>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <!-- CSS list -->
    <style type="text/css">
        .row-section{float:left; width:100%;}
        .row-section h2{float:left; width:100%; margin-bottom:30px; font-size: 14px;}
        .row-section h2 span{display:block; font-size:45px; text-transform:none; margin-bottom:20px; margin-top:30px;font-weight:700;}
        .row-section .row-block{padding:1px; margin-bottom:250px;}
        .row-section .row-block ul{margin:0; padding:0;}
        .row-section .row-block ul li{list-style:none; margin-bottom:10px;}
        .row-section .row-block ul li:last-child{margin-bottom:0;}
        .row-section .row-block ul li:hover{cursor:grabbing;}
        .row-section .row-block .media{border:1px solid #d5dbdd; padding:5px 20px; border-radius: 5px; box-shadow:0px 2px 1px rgba(0,0,0,0.04); background:#fff;}
        .row-section .media .media-body h4 {font-size: 18px; font-weight: 600; margin-bottom: 10; padding-left: 15px; margin-top:10px;}
        .btn-default{background:#008B8B; color:#ffff; border-radius:5px; margin-right: 15px; border:none; font-size:16px;}
    </style>

<title>IRA(IPB Room Agency)</title>

<!--CSS Navbar -->
<!-- Custom styles for this template -->
    <link href="floating-labels.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar IRA -->
    <?php include_once "include/navbar.php"; ?>

<h2 style="margin-left: 1cm;"><span>Order</span></h2>
<!--List-->
<section class="row-section">
    <div class="container">
        <div class="row">
        <div class="col-md-10 offset-md-1 row-block">
            <ul id="sortable">

                <?php
                     $query = "SELECT * from order_room where id_user = $id";
                     $result = $crud->getData($query);

                     if($result->num_rows > 0) {
                            while($res = mysqli_fetch_array($result)){
                                $order = new Order($res['id_order']);
                                $user = new Mahasiswa($order->getId_user());
                                $room = new Room($order->getId_room());
                                $pj = new Pj($order->getId_pj());
                                
                                if($order->getStatus() == "waiting"){
                ?>
                        
                <li>
                    <div class="media">
                    <div class="media-body">
                        <h4><?php echo $room->getTitle(); ?></h4>
                        <div class="alert alert-warning" style="width: 400px; height: 50px;">
                            <i class="far fa-clock"></i> Menunggu Konfirmasi PJ Ruangan.
                        </div>
                        <p><?php echo $order->getDateCreated(); ?></p>
                    </div>
                        <div class="media-right align-self-center">
                            <a href="detail_room.html" class="btn btn-default">Order Detail</a>
                        </div>
                    </div>
                 </li>      
                
                    <?php } //end of waiting if

                        else if($order->getStatus() == "buying") {
                    ?>
                         <li>
                            <div class="media">
                            <div class="media-body">
                                <h4><?php echo $room->getTitle(); ?></h4>
                                <div class="alert alert-success" style="width: 400px; height: 50px;">
                                    <i class="far fa-clock"></i> Silakan Lakukan Pembayaran.
                                </div>
                                <p><?php echo $order->getDateCreated(); ?></p>
                            </div>
                                <div class="media-right align-self-center">
                                    <a href="detail_room.html" class="btn btn-default">Order Detail</a>
                                </div>
                            </div>
                        </li>    
                    <?php
                          } //end of buying if

                          else if($order->getStatus() == "finish") {
                    ?>
                          <li>
                            <div class="media">
                            <div class="media-body">
                                <h4><?php echo $room->getTitle(); ?></h4>
                                <div class="alert alert-success" style="width: 400px; height: 50px;">
                                    <i class="far fa-check-circle"></i> Pembayaran Sukses.
                                </div>
                                <p><?php echo $order->getDateCreated(); ?></p>
                            </div>
                                <div class="media-right align-self-center">
                                    <a href="detail_room.html" class="btn btn-default">Order Detail</a>
                                </div>
                            </div>
                        </li>
                    <?php   
                          } //end of if finish
                        } //end of while
                      }  else { echo "Anda Belum Memesan Ruangan."; } //end of if
                      ?>
<!--                       
                 <li>
                     <div class="media">
                        <div class="media-body">
                            <h4>RK. 16 FAC 401 C</h4>
                            <div class="alert alert-success" style="width: 300px; height: 50px;">
                                <i class="far fa-check-circle"></i> Pembayaran <a href="detail_room.html" class="alert-link">sukses</a>.
                            </div>
                            <p>3 Hari yang lalu</p>
                        </div>
                        <div class="media-right align-self-center">
                            <a href="detail_room.html" class="btn btn-default">Order Detail</a>
                        </div>
                     </div>
                </li>      
                 
                 <li><div class="media">
                        <div class="media-body">
                            <h4>RK. OFAC 3 B2 (R. Pinus Lt. 1)</h4>
                            <div class="alert alert-info" style="width: 300px; height: 50px;">
                                <strong>Info!</strong> Order <a href="detail_room.html" class="alert-link">Dibatalkan</a>.
                              </div>
                              <p>1 Minggu yang lalu</p>
                        </div>
                        <div class="media-right align-self-center">
                            <a href="detail_room.html" class="btn btn-default">Order Detail</a>
                        </div>
                 </div></li>

                 <li><div class="media">
                        <div class="media-body">
                            <h4>RK. OFAC 3 B2 (R. Pinus Lt. 2)</h4>
                            <div class="alert alert-success" style="width: 300px; height: 50px;">
                                <strong>Success!</strong> Pembayaran <a href="detail_room.html" class="alert-link">sukses</a>.
                              </div>
                              <p>1 Bulan yang lalu</p>
                        </div>
                        <div class="media-right align-self-center">
                            <a href="detail_room.html" class="btn btn-default">Order Detail</a>
                        </div>
                 </div></li>

                 <li><div class="media">
                        <div class="media-body">
                            <h4>RK. OFAC 4 B11</h4>
                            <div class="alert alert-warning" style="width: 300px; height: 50px;">
                                <strong>Warning!</strong> Waktu Habis <a href="detail_room.html" class="alert-link">read</a>.
                              </div>
                              <p>3 Bulan yang lalu</p>
                        </div>
                        <div class="media-right align-self-center">
                            <a href="detail_room.html" class="btn btn-default">Order Detail</a>
                        </div>
                 </div></li> -->

            </ul>
        </div>
        </div>
      </div>
</div>
</section>
</body>
</html>