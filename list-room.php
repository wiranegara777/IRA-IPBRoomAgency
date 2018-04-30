<?php
session_start();
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Mahasiswa.php");
include_once "classes/Room.php";
include_once "classes/Pj.php";

$fakultas = $_GET['fakultas'];

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
$query = "SELECT * FROM room WHERE fakultas = '$fakultas'";
$result = $crud->getData($query);

?>
<!DOCTYPE html>
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
@import url('https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700');
@import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
.row-section{float:left; width:100%;
}
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
      
</head>
<body>
    <!-- Navbar IRA -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #008B8B;">
  <a class="navbar-brand" href="Beranda.html">IRA(IPB Room Agency)</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <!-- Search -->
      <form class="form-inline my-2 my-lg-0">
        <input style="width:300px;" class="form-control mr-sm-2" type="search" placeholder="Search Room" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" style="color: whitesmoke; border-color: whitesmoke;" type="submit">Search</button>
      </form>
    </ul>

    <!-- navbar right -->
    <ul class="navbar-nav navbar-right">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Notifikasi <i class="fa fa-bell" aria-hidden="true"></i> <span class="badge badge-danger">1</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a href="#" class="dropdown-item">Order</a>
          <a class="dropdown-item" href="#">Pesan</a>
         <!-- <div class="dropdown-divider"></div>          
          <a class="dropdown-item" href="Login.html">Logout</a> -->
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Mahasiswa
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a href="#" class="dropdown-item">Profil</a>
          <a class="dropdown-item" href="Login.html">Logout</a>
         <!-- <div class="dropdown-divider"></div>          
          <a class="dropdown-item" href="Login.html">Logout</a> -->
        </div>
      </li>
    </ul>
    

  </div>
</nav>

<section class="row-section">
        <div class="container">
            <div class="row">
                <h2 class="text-center"><span>Fakultas <?php echo $fakultas; ?> </span></h2>
            </div>
            <div class="col-md-10 offset-md-1 row-block">
                <ul id="sortable">
                    <?php while($res = mysqli_fetch_array($result)) {   ?>
                     <li><div class="media">
                            <div class="media-body">
                                <h4> <?php echo $res['title']; ?> </h4>
                            </div>
                            <div class="media-right align-self-center">
                                <a href="detail-room.html" class="btn btn-default">Lihat Detail</a>
                            </div>
                     </div></li>      
                    <?php } ?>
                </ul>
            </div>
    </div>
    </section>

    
<script type="text/javascript">

</script>
</body>
</html>
