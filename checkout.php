<?php 
    session_start();
    include_once "classes/Crud.php";
    include_once "classes/order.php";
    include_once "classes/Room.php";
    include_once "classes/Mahasiswa.php";
    include_once "classes/Pj.php";

    $crud = new Crud();
    $id_order = $crud->escape_string($_GET['id']);
    $order = new Order($id_order);
    $user = new Mahasiswa($order->getId_user());
    $room = new Room($order->getId_room());
    $pj = new Pj($order->getId_pj());
?>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      
    <link rel="stylesheet" href="css/loader.css">

    <title>Checkout</title>
    <body onload="myFunction()" style="margin:0;">

        <div id="loader"></div>
        <center><p style="margin-top:400px;" id="wait">Processing Your Order</p></center>

        <div class="card">
            <div class="card-body">
                <div style="display:none;" id="myDiv" class="animate-bottom">
                <h2>Success Making Your Checkout!</h2>
                    <p>Here is Your detail!</p>
                    <p>pemesan: <?php echo $user->getName(); ?></p>
                    <p>pj: <?php echo $pj->getName(); ?></p>
                    <p>ruangan: <?php echo $room->getTitle(); ?></p>
                    <p>Durasi: <?php echo $order->getDuration(); ?> hari</p>
                    <p>Harga: Rp.<?php echo $order->getSum_price(); ?></p>
                    <p>payment: 
                        <?php 
                            if ($order->getPayment() == 1)
                                echo "BCA (TRANSFER)";
                            else if ($order->getPayment() == 2)
                                echo "CashOnDelivery"; 
                        ?>
                    </p>
                    <a href="index.php">Back to HomePage</a>
                </div>  
            </div>
        </div>


    </body>
</html>

<script>
        var myVar;

        function myFunction() {
            myVar = setTimeout(showPage, 3000);
        }

        function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("wait").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
        }
 </script>