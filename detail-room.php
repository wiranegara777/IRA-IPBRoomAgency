<?php
    session_start();
    include_once "classes/Crud.php";
    include_once "classes/Room.php";
    include_once "classes/Mahasiswa.php";
    include_once "classes/Pj.php";
    include_once "classes/order.php";
    include_once "classes/Rating.php";

    //get Mahasiswa
    $Mahasiswa = new Mahasiswa($_SESSION['id']);

    $id_user = $_SESSION['id'];

    $crud = new Crud();

    //get room with specified id
    $id = $crud->escape_string($_GET['id']);

    //get room
    $room = new Room($id);
    
    //get name Pjruang
    $pj = new Pj($room->getId_user());

    //hitung rata-rata rating
    $query_avg = "SELECT AVG(rating) AS rate FROM rating WHERE id_room = $id";
    $result = $crud->getData($query_avg);
    $res_avg = mysqli_fetch_array($result);
    $avg_rate = $res_avg['rate'];
?>
<html lang="en">
<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- JQUERY -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    
<title>Detail Ruangan 1</title>
  
</head>
<body>
    <!-- Navbar IRA -->
    <?php include_once "include/navbar.php"; ?>

<!-- nama ruangan-->
<h2 style="margin-left: 2cm;"><dt><?php echo $room->getTitle(); ?></dt></h2>
<!--slider gambar-->
  <div class="row">
    <div class="col-sm">
      <div id="carouselExampleControls" style="width: 100%; margin-left: 2cm;" class="span6 carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" style="width: 50px; height: 350px;" src="<?php echo $room->getImage(); ?>" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" style="width: 50px; height: 350px;" src="<?php echo $room->getImage2(); ?>" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" style="width: 50px; height: 350px;" src="<?php echo $room->getImage3(); ?>" alt="Third slide">
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
      <!-- Detail Ruangan -->
      <div style="margin-left: 2cm">
        <h5><dt>Detail Ruangan:</dt></h5>
        <dd>Lokasi      : <?php echo $room->getAddress(); ?></dd>
        <dd>Kapasitas   :<?php echo $room->getKapasitas(); ?> orang.</dd>
        <dd>Fasilitas   : <?php echo $room->getFasilitas(); ?></dd>
        <h5><dt>Penanggung Jawab Ruangan</dt></h5>
        <dd>Nama        : <?php echo $pj->getName(); ?></dd>
        <dd>Hubungi     :</dd>
        <!-- Button trigger modal -->
          <button type="button" style="color: whitesmoke; border-color: whitesmoke" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-phone" aria-hidden="true"></i></button>
          <a href="pesan.html" class="btn btn-info" role="button"><i class="fa fa-comments" aria-hidden="true"></i></a>  
<br></br>
		<!--rating dkk-->
<div class="table-bordered">
		<div class="row" style="margin-left: 1cm">
				<div class="col-sm-3">
					<div class="rating-block">
						<h5><dt>Average user rating</dt></h5>
						<h2 class="bold padding-bottom-7">4.5 <small>/ 5.0</small></h2>
						<a>
								<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half"></i>
						</a>
					</div>
				</div>
				<div class="col-sm-3">
					<h5><dt>Rating breakdown</dt></h5>
					<div class="pull-left">
						<div class="pull-left" style="width:35px; line-height:1;">
							<div style="height:9px; margin:5px 0;">5 <span class="glyphicon glyphicon-star"></span></div>
						</div>
						<div class="pull-left" style="width:180px;">
							<div class="progress" style="height:9px; margin:8px 0;">
								<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
								<span class="sr-only">80% Complete (danger)</span>
								</div>
							</div>
						</div>
						<div class="pull-right" style="margin-left:10px;">1</div>
					</div>
					<div class="pull-left">
						<div class="pull-left" style="width:35px; line-height:1;">
							<div style="height:9px; margin:5px 0;">4 <span class="glyphicon glyphicon-star"></span></div>
						</div>
						<div class="pull-left" style="width:180px;">
							<div class="progress" style="height:9px; margin:8px 0;">
								<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
								<span class="sr-only">80% Complete (danger)</span>
								</div>
							</div>
						</div>
						<div class="pull-right" style="margin-left:10px;">1</div>
					</div>
					<div class="pull-left">
						<div class="pull-left" style="width:35px; line-height:1;">
							<div style="height:9px; margin:5px 0;">3 <span class="glyphicon glyphicon-star"></span></div>
						</div>
						<div class="pull-left" style="width:180px;">
							<div class="progress" style="height:9px; margin:8px 0;">
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
								<span class="sr-only">80% Complete (danger)</span>
								</div>
							</div>
						</div>
						<div class="pull-right" style="margin-left:10px;">0</div>
					</div>
					<div class="pull-left">
						<div class="pull-left" style="width:35px; line-height:1;">
							<div style="height:9px; margin:5px 0;">2 <span class="glyphicon glyphicon-star"></span></div>
						</div>
						<div class="pull-left" style="width:180px;">
							<div class="progress" style="height:9px; margin:8px 0;">
								<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
								<span class="sr-only">80% Complete (danger)</span>
								</div>
							</div>
						</div>
						<div class="pull-right" style="margin-left:10px;">0</div>
					</div>
					<div class="pull-left">
						<div class="pull-left" style="width:35px; line-height:1;">
							<div style="height:9px; margin:5px 0;">1 <span class="glyphicon glyphicon-star"></span></div>
						</div>
						<div class="pull-left" style="width:180px;">
							<div class="progress" style="height:9px; margin:8px 0;">
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
								<span class="sr-only">80% Complete (danger)</span>
								</div>
							</div>
						</div>
						<div class="pull-right" style="margin-left:10px;">0</div>
					</div>
				</div>			
			</div>			
		</div>
		<!--tambah rating dan comment-->
		<div class="table-bordered">	<br>	
		<form>
						<div style="margin-left: 0.5cm">
								<div class="form-group">
										<h5  for="comment">Tambahkan Ulasan:</h5>
										<textarea style="height: 50%; width: 70%" class="form-control" rows="3" id="comment"></textarea>
								</div>
								</div>
							<div class="form-group" style="margin-left: 0.5cm">
								<h5  class="mr-sm-2" for="inlineFormCustomSelect">Nilai</h5>
								<select style=" height: 50%; width: 70%" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
									<option selected>Choose...</option>
									<option value="1"><div class="rating"><span>★</span></div></option>
									<option value="2"><div class="rating"><span>★</span><span>★</span></div></option>
									<option value="3"><div class="rating"><span>★</span><span>★</span><span>★</span></div></option>
									<option value="4"><div class="rating"><span>★</span><span>★</span><span>★</span><span>★</span></div></option>
									<option value="5"><div class="rating"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div></option>
								</select>
							</div>
							<div style="margin-left: 0.5cm">
								<button type="submit" class="btn btn-primary" style="background-color: #008B8B;">Submit</button>
							</div></br>					
				</div>
      
		</div>
	</div>
    <br>
<!--kanan-->
<div class="col-sm" style="margin-left :3in"> 
	<!-- Calendar -->
	<h4><dt>Jadwal Pemakaian Ruangan</dt></h4>

	<!-- Calendar -->
    <div style="width:400px;">
            <?php include_once "calendar.php"; ?>
    </div>

	 <!-- button for modal OrderRoom -->
     <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> -->
     
     <button class="btn btn-primary"> <!--  -->
                Order Room
        </button>
    <a href="order.php?id=<?php echo $id; ?>">order</a>
    <a href="" data-toggle="modal" data-target="#ORDER">eee</a>

    <form action="proses/signUp.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr> 
                <td>Nim</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr> 
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr> 
                <td>Departemen</td>
                <td><input type="text" name="departemen"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>

<!-- </a> -->
	<br></br>
<!--tampilan review dan komen-->
<h5><dt>Tanggapan</dt></h5>
		<div class="row">
			<div class="col-sm-7">
				<hr/>
				<div class="review-block">
					<div class="row">
						<div class="col-sm-3">
							<i class="fa fa-user fa-4x"></i>
							<div class="review-block-name"><a href="#">Syaufina</a></div>
							<div class="review-block-date">January 29, 2016<br/>1 day ago</div>
						</div>
						<div class="col-sm-9">
							<div class="review-block-rate">
									<a>
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
									</a>
							</div>
							<div class="review-block-title">Bagus Sekali</div>
							<div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
						</div>
					</div>
					<hr/>
					<div class="row">
						<div class="col-sm-3">
							<i class="fa fa-user fa-4x"></i>
							<div class="review-block-name"><a href="#">Asep</a></div>
							<div class="review-block-date">January 29, 2016<br/>1 day ago</div>
						</div>
						<div class="col-sm-9">
							<div class="review-block-rate">
									<a>
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
									</a>
							</div>
							<div class="review-block-title">Bagus Sekali</div>
							<div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
						</div>
					</div>
					<hr/>
					<div class="row">
						<div class="col-sm-3">
							<i class="fa fa-user fa-4x"></i>
							<div class="review-block-name"><a href="#">Wiranegara</a></div>
							<div class="review-block-date">January 29, 2016<br/>1 day ago</div>
						</div>
						<div class="col-sm-9">
							<div class="review-block-rate">
									<a>
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
									</a>
							</div>
							<div class="review-block-title">Bagus</div>
							<div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	
		</div></br></br>
<!-- Maps IPB-->
<center>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.7114274851033!2d106.72759211432371!3d-6.558065665932638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69db52b8cf36eb%3A0x6ec291b175edd090!2sAuditorium+Toyib+Hadiwijaya!5e0!3m2!1sen!2sid!4v1524743363311" width="1200" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
</center>
 

    <?php include "include/footer.php"; ?>
  </body>
</html>

</body>

<!-- Modal for OrderRoom -->
    <!-- Modal -->
    <div class="modal fade" id="ORDER" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- modal title -->
        <h5 class="modal-title" id="exampleModalLabel">Order Room <?php echo $room->getTitle(); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- modal body -->
      <div class="modal-body">
        <!-- form -->
            <p>Peminjam: <?php echo $Mahasiswa->getName(); ?> </p>
            <p>PjRuang: <?php echo $pj->getName(); ?> </p>
            <p>Harga: Rp.<?php echo $room->getPrice(); ?>/day </p>
            <form role="form" method="post" action="proses/order_process.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Duration</label>
                    <input type="text" name="duration" class="one form-control"  placeholder="Enter duration order">
                </div>
                <!-- hidden -->
                <input class="two" type="hidden" value="<?php echo $room->getPrice(); ?>">
                <div class="form-group">
                    <label for="exampleInputPassword1">Pick Your Order date</label>
                    <input type="date" name="date" class="form-control" id="datepicker" placeholder="DD/MM/YYYY">
                </div>
                <!-- metode pembayaran -->
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Payment Method</label>
                    <select name="payment" class="form-control" id="exampleFormControlSelect1">
                        <option value="1">BCA (Transfer)</option>
                        <option value="2">COD (Cash on Delivery)</option>
                    </select>
                </div>
                <p>Total Harga: Rp.<tag class="result"></tag></p>
                <input type="hidden" name="price" value="<?php echo $room->getPrice(); ?>">
                <input type="hidden" name="id_user" value="<?php echo $Mahasiswa->getId(); ?>">
                <input type="hidden" name="id_pj" value="<?php echo $pj->getId(); ?>">
                <input type="hidden" name="id_room" value="<?php echo $room->getId_room(); ?>">
                
                <div class="modal-footer">
                    <!-- <input type="submit" name="submit" class="container btn btn-primary" value="submit"> -->
                    <button type="submit" name="submit" class="container btn btn-primary">Order this Room</button>
                    <button type="button" class="container btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <!-- <button type="button" class="btn btn-primary">Order This Room</button> -->
                </div>
            </form>
      </div>
      
    </div>
  </div>
</div>
<!-- end of modal -->

</html>

<script>
    $(".one, .two").keyup(function() {
    if($('.one').val() != "" && $('.two').val() != "") {
        var result = parseInt($('.one').val()) * parseInt($('.two').val());
        $('.result').text(result);
    }
});
</script>