<!DOCTYPE html>
<?php
session_start();
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Mahasiswa.php");
include_once "classes/Room.php";
include_once "classes/Pj.php";
include_once "classes/Order.php";

if(isset($_SESSION['name'])) {
 // echo "Your session is running " . $_SESSION['name'];    
     $Mahasiswa = new Mahasiswa($_SESSION['id']);
    // echo "Your session is running " . $Mahasiswa->getName();
}else{
    echo '<script language="javascript">alert("Please Login First");</script>'; 
    echo '<script>document.location.href="login.php";</script>';
}
$crud = new Crud();
 
//fetching user with DESC order
$query = "SELECT * FROM user ORDER BY id DESC";
$result = $crud->getData($query);

$id_order = $_GET['id'];

$order = new Order($id_order);
$user = new Mahasiswa($order->getId_user());
$room = new Room($order->getId_room());
$pj = new Pj($order->getId_pj());

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

<title>IRA(IPB Room Agency)</title>

<!--CSS Navbar -->
  
<!-- Custom styles for this template -->
    <link href="floating-labels.css" rel="stylesheet">

    <style type="text/css">
      .bs-wizard {margin-top: 40px;}

/*Form Wizard*/
.bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
.bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
.bs-wizard > .bs-wizard-step + .bs-wizard-step {}
.bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
.bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
.bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #58d4d4; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #008B8B; border-radius: 50px; position: absolute; top: 8px; left: 8px; } 
.bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
.bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #58d4d4;}
.bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
.bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
.bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
.bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
.bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
.bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
.bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
/*END Form Wizard*/
.tombol{
  background-color: #008B8B;
}
.tombol:hover{
  background-color: #006d6d;
  border-color: #006d6d;
}
  </style>
</head>
<body>
    <!-- Navbar IRA -->
<?php include_once "include/navbar.php"; ?>

<h2 style="margin-left: 2cm; padding-top: 1cm;"><dt>Detail Order</dt></h2>
<div class="container" style="margin-top: 1.5cm; margin-bottom: 3cm;" >
    <div class="row">
      <div class="col-5">
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

            </ul>
      </div>

      <div class="col">

        </div>
        
      <div class="col-5">
                <div id="carouselExampleControls" style="width: 100%;" class="span6 carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" style="width: 50px; height: 350px;" src="image/Toyib.png" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" style="width: 50px; height: 350px;" src="image/Auditorium-gmsk-1.jpg" alt="Second slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block w-100" style="width: 50px; height: 350px;" src="image/Toyib.png" alt="Third slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>

                <h4 style="padding-top: 1cm;"><dt>Status Order :</dt></h4>

                <div class="container">     
                    <div class="row bs-wizard" style="border-bottom:0;">
                        
                        <div class="col bs-wizard-step complete">
                          <div class="text-center bs-wizard-stepnum">Step 1</div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <a href="#" class="bs-wizard-dot"></a>
                          <div class="bs-wizard-info text-center">Pemesanan</div>
                        </div>

                        
                        <div class="col bs-wizard-step active"><!-- complete -->
                          <div class="text-center bs-wizard-stepnum">Step 2</div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <a href="#" class="bs-wizard-dot"></a>
                          <div class="bs-wizard-info text-center">Pembayaran</div>
                        </div>
                        
                        <div class="col bs-wizard-step disabled"><!-- active -->
                          <div class="text-center bs-wizard-stepnum">Step 3</div>
                          <div class="progress"><div class="progress-bar"></div></div>
                          <a href="#" class="bs-wizard-dot"></a>
                          <div class="bs-wizard-info text-center">Order Sukses!</div>
                        </div>
                    </div>  
          </div>

          <?php if($order->getBukti() == "null") {?>

          <h3>Upload Bukti Bayar</h3>
          <form role="form" method="post" action="proses/addBukti.php" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="hidden" name="id_order" value="<?php echo $id_order; ?>">
            <button class="btn btn-info tombol" type="submit" name="submit" style="margin-top: 10%; margin-left: 55%">Konfirm Pembayaran</button>
          </form>
          <?php } else { ?>
              <h3>Bukti Bayar</h3>
              <img src="<?php echo $order->getBukti();?>" style="height: 300px;">
          <?php } ?>
            

        </div>
    </div>
  </div>

</body>
</html>