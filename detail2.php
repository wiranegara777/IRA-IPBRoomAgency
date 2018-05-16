<!DOCTYPE html>
<html lang="en">
<head>
 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

   <style/ type="text;">
    .rating > span:hover:before {
      content: "\2605";
      position: absolute;
    }

body {
  padding-top: 70px;
}
.btn-grey{
    background-color:#D8D8D8;
	color:#FFF;
}
.rating-block{
	background-color:#FAFAFA;
	border:1px solid #EFEFEF;
	padding:15px 15px 20px 15px;
	border-radius:3px;
}
.bold{
	font-weight:700;
}
.padding-bottom-7{
	padding-bottom:7px;
}

.review-block{
	background-color:#FAFAFA;
	border:1px solid #EFEFEF;
	padding:15px;
	border-radius:3px;
	margin-bottom:15px;
}
.review-block-name{
	font-size:12px;
	margin:10px 0;
}
.review-block-date{
	font-size:12px;
}
.review-block-rate{
	font-size:13px;
	margin-bottom:15px;
}
.review-block-title{
	font-size:15px;
	font-weight:700;
	margin-bottom:10px;
}
.review-block-description{
	font-size:13px;
}
    </style>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<title>Detail Ruangan</title>

<!-- Custom styles for this template -->
    <link href="floating-labels.css" rel="stylesheet">
  
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
        <button class="btn btn-outline-success my-2 my-sm-0" style="color: whitesmoke; border-color: whitesmoke " type="submit">Search</button>
      </form>
    </ul>

    <!-- navbar right -->
    <ul class="navbar-nav navbar-right">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Notifikasi <i class="fa fa-bell" aria-hidden="true"></i> <span class="badge badge-danger">1</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a href="list_order.html" class="dropdown-item">Order</a>
          <a class="dropdown-item" href="pesan.html">Pesan <span class="badge badge-danger">1</span></a>
        
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Mahasiswa <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a href="#" class="dropdown-item">Profil</a>
          <a class="dropdown-item" href="Login.html">Logout</a>
       
        </div>
      </li>
    </ul>
  </div>
</nav>

<!-- nama ruangan-->
<h2 style="margin-left: 2cm;"><dt>Auditorium Toyib Hadiwijaya</dt></h2>
<!--slider gambar-->
  <div class="row">
    <div class="col-sm">
      <div id="carouselExampleControls" style="width: 100%; margin-left: 2cm;" class="span6 carousel slide" data-ride="carousel">
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
      <!-- Detail Ruangan -->
      <div style="margin-left: 2cm">
        <h5><dt>Detail Ruangan:</dt></h5>
        <dd>Lokasi      : Fakultas Pertanian IPB.</dd>
        <dd>Kapasitas   : 400 orang.</dd>
        <dd>Fasilitas   : AC, Alat dan Ruang Audio Visual dan Toilet.</dd>
        <h5><dt>Jawab Ruangan</dt></h5>
        <dd>Nama        : Kohar</dd>
        <dd>Hubungi     :</dd>
        <!-- Button trigger modal -->
          <button type="button" style="color: whitesmoke; border-color: whitesmoke" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-phone" aria-hidden="true"></i></button>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Telepon</h5>
                  <button type="button" class="close" data-dismiss="modal" style="color: #008B8B; border-color: #008B8B" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <abbr>081296362067</abbr>
                </div>
                <div class="modal-footer">
                  <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                  
                </div>
              </div>
            </div>
          </div>
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
							</div>					
				</div>
      
		</div>
	</div>
    <br>
<!--kanan-->
<div class="col-sm" style="margin-left :3in"> 
	<!-- Calendar -->
	<h4><dt>Jadwal Pemakaian Ruangan</dt></h4>
	<h1>GAMBAR KALENDER</h1>
	<a href="order_room.html" class="btn btn-info" role="button" style="background-color: #008B8B;">Order Ruangan</a>
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
	
		</div>
      <!--<div class="col-sm">
        <h4 style="margin-left: 1in;"><dt>Jadwal Pemakaian Ruangan</dt></h4>
        <h1 style="margin-left: 1in">KALENDER</h1>
        <a style="margin-left: 1in" href="order_room.html" class="btn btn-info" role="button" style="color: #008B8B; border-color: #008B8B">Order Ruangan</a>
        <h3 style="margin-left: 1in;">Nilai Ruangan</h3>
        
        <a style="margin-left: 1in;">
          <i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star fa-2x"></i><i class="fa fa-star-half fa-2x"></i>
          <h4 style="margin-left: 1in;">4.5/5.0</h4></a>
        <br>
        <form>
            <div>
                <div class="form-group">
                    <label style="margin-left: 1in" for="comment">Tambahkan Ulasan:</label><br>
                    <textarea style="margin-left: 1in; height: 50%; width: 50%" class="form-control" rows="3" id="comment"></textarea>
                </div>
                </div>
              <div class="form-group">
                <label style="margin-left: 1in" class="mr-sm-2" for="inlineFormCustomSelect">Nilai</label><br>
                <select style="margin-left: 1in;  height: 50%; width: 50%" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                  <option selected>Choose...</option>
                  <option value="1"><div class="rating"><span>★</span></div></option>
                  <option value="2"><div class="rating"><span>★</span><span></span></div></option>
                  <option value="3"><div class="rating"><span>★</span><span>★</span><span>★</span></div></option>
                  <option value="4"><div class="rating"><span>★</span><span>★</span><span>★</span><span>★</span></div></option>
                  <option value="5"><div class="rating"><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div></option>
                </select>
              </div>
              <div style="margin-left: 1in" >
                <button type="submit" class="btn btn-primary" style="background-color: #008B8B;">Submit</button>
              </div>
            </div>
          </form>
    
      </div>
    </div> -->

<!-- Maps IPB-->
<center>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.7114274851033!2d106.72759211432371!3d-6.558065665932638!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69db52b8cf36eb%3A0x6ec291b175edd090!2sAuditorium+Toyib+Hadiwijaya!5e0!3m2!1sen!2sid!4v1524743363311" width="1200" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
</center>
 <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

</body>
</html>