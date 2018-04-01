<?php 
    session_start();
    include_once "classes/Crud.php";
    include_once "classes/order.php";
    include_once "classes/Room.php";
    include_once "classes/Mahasiswa.php";
    include_once "classes/Pj.php";

    $id = $_SESSION['id'];
    $crud = new Crud();
  //  $id_order = $crud->escape_string($_GET['id']);
?>
<html lang="en">
    <title>Notifications</title>
    <body>
        <ul>
        <?php
            $query = "SELECT * from order_room where id_user = $id";
            $result = $crud->getData($query);
            //cek apakah pernah order
            if($result->num_rows > 0){
              while($res = mysqli_fetch_array($result)) {
                $order = new Order($res['id_order']);
                $user = new Mahasiswa($order->getId_user());
                $room = new Room($order->getId_room());
                $pj = new Pj($order->getId_pj());
        ?>
            <li>
                <p> <?php echo $user->getName(); ?> </p>
                <p> <?php echo $room->getTitle(); ?> </p>
            </li>
        <?php }
            //end of while 
        } else { echo "Anda belum Memesan Ruangan"; }
        //end of if
        ?>
        </ul>
    </body>
</html>