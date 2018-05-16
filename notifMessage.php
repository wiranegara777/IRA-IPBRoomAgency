<?php 

    session_start();
    include_once "classes/Crud.php";
    include_once "classes/order.php";
    include_once "classes/Room.php";
    include_once "classes/Mahasiswa.php";
    include_once "classes/Pj.php";

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
</head>
<body>
    <!-- Navbar IRA -->
    <?php include "include/navbar.php"; ?>

<h2 style="margin-left: 2cm; padding-top: 1cm;"><dt>Pesan</dt></h2>

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

                 <a href='message.php?id_pj=<?php echo $id;?>' class="list-group-item" style="color: #008B8B;">
                   <div class="row justify-content-center" style="width: 100%; margin-left: 12px;">
                        <div class="col-1">
                            <i class="fa fa-user-circle-o fa-3x" style="color: #008B8B;"></i>
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


</body>
</html>