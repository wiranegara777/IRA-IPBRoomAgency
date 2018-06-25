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
    <title>Detail Room</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- JQUERY -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
    

    <body>
    <?php include "include/navbar.php" ?>
    <br>

        <div class="container">
            <div class="row">
                <div class="col-7">
                    <!-- cariousel -->
                    <div id="carouselExampleControls" style="width: 100%;" class="span6 carousel slide" data-ride="carousel">
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
                    <!-- end of carousel -->
                    <!-- description -->
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Detail Ruangan</h5>
                            <p class="card-text">Deskripsi : <?php echo $room->getBody(); ?></p>
                            <p class="card-text">Lokasi : <?php echo $room->getAddress(); ?></p>
                            <p class="card-text">Harga :Rp. <?php echo $room->getPrice(); ?></p>
                            <p class="card-text">Kapasitas : <?php echo $room->getKapasitas(); ?> Orang</p>
                            <p class="card-text">Fasilitas : <?php echo $room->getFasilitas(); ?></p>

                            <h5 class="card-title">Penanggung Jawab Ruangan</h5>
                            <p class="card-text">Nama : <?php echo $pj->getName(); ?></p>
                            <p class="card-text">No. Telp : <?php echo $pj->getPhone(); ?></p>

                            <button type="button" class="container btn btn-primary" data-toggle="modal" data-target="#ORDER">Order</button>
                            <a href = "message.php?id_pj=<?php echo $pj->getId(); ?>"> <button type="button" class="container btn btn-secondary">Personal Message</button></a>

                        </div>
                    </div>
                    <!-- end of deskripsi -->
                    <!-- RATING -->
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7">
                                    <h3> Rating Average</h3>
                                    <h3>4.5/5.0</h3>
                                    <h3 class="text-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></h3>
                                </div>

                                <div class="col">
                                    <h3> Rating Breakdown</h3>
                                    <h3 class="text-warning"><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>(1)</h3>
                                    <h3 class="text-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>(2)</h3>
                                    <h3 class="text-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>(3)</h3>
                                    <h3 class="text-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>(2)</h3>
                                    <h3 class="text-warning"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>(12)</h3>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FORM RATING -->
                    <div class="card" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">Berikan Ulasan</h5>
                            <form>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Rating</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                <option><span>★</span></option>
                                <option><span>★★</span></option>
                                <option><span>★★★</span></option>
                                <option><span>★★★★</span></option>
                                <option><span>★★★★★</span></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Ulasan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="container btn btn-primary">Rate</button>
                            </form>
                        </div>
                    </div>
                    <!-- end of rating -->

                </div>
                <!-- end of kiri -->
                <!-- kanan -->
                <div class="col">
                    <h3>Jadwal Pemakaian Ruangan</h3>
                    <?php include "calendar.php"; ?>

                <div class="card" style="width: 100%;">
                <h3> Recent Review </h3>
                    <div class="card-body">
                        <!-- RECENT REVIEW -->
                       
                        <div class="row">
                            <div class="col-sm-3">
                                <i class="fa fa-user fa-3x"></i>
                                <div ><a href="#">Asep</a></div>
                                <div class="review-block-date">January 29, 2016</div>
                            </div>
                            <div class="col-sm-9">
                                <div class="review-block-rate">
                                        <h4 class="text-warning">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                        </h4>
                                </div>
                                <div class="review-block-description">  this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
                            </div>
                        </div>
                     </div>   
                </div>
                
                </div>
                <!-- end of kanan -->
            </div>

        </div> <!-- end of container -->


    <?php include "include/footer.php"; ?>
    </body>

</html>


<!-- Modal for OrderRoom -->
    <!-- Modal -->
    <div class="modal fade" id="ORDER" tabindex="-1" role"dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

<script>
    $(".one, .two").keyup(function() {
    if($('.one').val() != "" && $('.two').val() != "") {
        var result = parseInt($('.one').val()) * parseInt($('.two').val());
        $('.result').text(result);
    }
});
</script>