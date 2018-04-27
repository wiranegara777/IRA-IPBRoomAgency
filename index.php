<!DOCTYPE html>
<?php
session_start();
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Mahasiswa.php");
include_once "classes/Room.php";
include_once "classes/Pj.php";

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
</head>
<body>
    <!-- Navbar IRA -->
    <?php include_once "include/navbar.php"; ?>
<!--slider gambar-->
<br>
<br>
<center>
    <div id="carouselExampleControls" style="width: 80%;" class="span6 carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" style="width: 120px; height: 500px;" src="image/Toyib.png" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" style="width: 120px; height: 500px;" src="image/Auditorium-gmsk-1.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" style="width: 120px; height: 500px;" src="image/Toyib.png" alt="Third slide">
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
   </center>
    <br></br>
    <br></br>

<!--Fakultas-->
      <div class="container">
        <div class="row">
          <div class="col-sm">
            <div class="card" style="width: 12rem;">
                <img class="card-img-top" src="image/IPB.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">FAPERTA</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="List_Ruangan.html" class="btn btn-primary">Lihat Detail</a>
                    </div>
            </div>
            <br></br>
            <div class="card" style="width: 12rem;">
                <img class="card-img-top" src="image/IPB.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">FKH</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="List_Ruangan.html" class="btn btn-primary">Lihat Detail</a>
                    </div>
            </div>
            <br></br>
            <div class="card" style="width: 12rem;">
                <img class="card-img-top" src="image/IPB.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">FPIK</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="List_Ruangan.html" class="btn btn-primary">Lihat Detail</a>
                    </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="card" style="width: 12rem;">
                <img class="card-img-top" src="image/IPB.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">FAPET</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="List_Ruangan.html" class="btn btn-primary">Lihat Detail</a>
                    </div>
            </div>
            <br></br>
            <div class="card" style="width: 12rem;">
                <img class="card-img-top" src="image/IPB.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">FAHUTAN</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="List_Ruangan.html" class="btn btn-primary">Lihat Detail</a>
                    </div>
            </div>
            <br></br>
            <div class="card" style="width: 12rem;">
                <img class="card-img-top" src="image/IPB.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">FATETA</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="List_Ruangan.html" class="btn btn-primary">Lihat Detail</a>
                    </div>
\            </div>
          </div>
          <div class="col-sm">
            <div class="card" style="width: 12rem;">
                <img class="card-img-top" src="image/IPB.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">FMIPA</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="List_Ruangan.html" class="btn btn-primary">Lihat Detail</a>
                    </div>
            </div>
            <br></br>
            <div class="card" style="width: 12rem;">
                <img class="card-img-top" src="image/IPB.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">FEM</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="List_Ruangan.html" class="btn btn-primary">Lihat Detail</a>
                    </div>
            </div>
            <br></br>
            <div class="card" style="width: 12rem;">
                <img class="card-img-top" src="image/IPB.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">FEMA</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="List_Ruangan.html" class="btn btn-primary">Lihat Detail</a>
                    </div>
            </div>
          </div>
          <div class="col-sm">
            <div class="card" style="width: 12rem;">
                <img class="card-img-top" src="image/IPB.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">AUDIT</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="List_Ruangan.html" class="btn btn-primary">Lihat Detail</a>
                    </div>
            </div>
            <br></br>
            <div class="card" style="width: 12rem;">
                <img class="card-img-top" src="image/IPB.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Gymnasium</h5>
                    <!--<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>-->
                    <a href="List_Ruangan.html" class="btn btn-primary">Lihat Detail</a>
                    </div>
            </div>
          </div>
</body>
</html>