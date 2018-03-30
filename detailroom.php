<?php
    session_start();
    include_once "classes/Crud.php";
    include_once "classes/Room.php";
    include_once "classes/Mahasiswa.php";
    include_once "classes/Pj.php";

    //get Mahasiswa
    $mahasiswa = new Mahasiswa($_SESSION['id']);

    $crud = new Crud();

    //get room with specified id
    $id = $crud->escape_string($_GET['id']);

    //get room
    $room = new Room($id);
    
    //get name Pjruang
    $pj = new Pj($room->getId_user());
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
        <table>
            <tr bgcolor='#CCCCCC'>
                <td>title</td>
                <td>Description</td>
                <td>address</td>
                <td>Image</td>
                <td></td>
            </tr>
            <tr bgcolor='#CCCCCC'>
                <td><?php echo $room->getTitle(); ?></td>
                <td><?php echo $room->getBody(); ?></td>
                <td><?php echo $room->getAddress(); ?></td>
                <td><img style="height:350px;" src="<?php echo $room->getImage(); ?>"/></td>
                <td></td>
             </tr>
        </table>

        <!-- Calendar -->
        <div style="width:400px;">
            <?php include_once "calendar.php"; ?>
        </div>

        <!-- button for modal OrderRoom -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Order Room
        </button>

    </body>

    <!-- Modal for OrderRoom -->
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!-- modal title -->
        <h5 class="modal-title" id="exampleModalLabel">Oder Room <?php echo $room->getTitle(); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- modal body -->
      <div class="modal-body">
        <!-- form -->
            <p>Peminjam: <?php echo $mahasiswa->getName(); ?> </p>
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
                <input type="hidden" name="id_user" value="<?php echo $mahasiswa->getId(); ?>">
                <input type="hidden" name="id_pj" value="<?php echo $pj->getId(); ?>">
                <input type="hidden" name="id_room" value="<?php echo $room->getId_room(); ?>">
                
                <div class="modal-footer">
                    <button type="submit" name="submit" class="container btn btn-primary">Submit</button>
                    <button type="button" class="container btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <!-- <button type="button" class="btn btn-primary">Order This Room</button> -->
                </div>
            </form>
      </div>
      
    </div>
  </div>
</div>

</html>

<script>
    $(".one, .two").keyup(function() {
    if($('.one').val() != "" && $('.two').val() != "") {
        var result = parseInt($('.one').val()) * parseInt($('.two').val());
        $('.result').text(result);
    }
});
</script>
