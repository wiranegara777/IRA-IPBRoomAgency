<?php 
    include_once("../classes/Crud.php");
    include_once "../classes/Order.php";

    $crud = new Crud();

    if(isset($_POST['submit'])){

        $id_room =  $_POST['id_room'];
        $id_user =  $_POST['id_user'];
        $id_pj = $_POST['id_pj'];
        $price = $_POST['price'];
        $date = $_POST['date'];
        $payment = $_POST['payment'];
        $duration = $_POST['duration'];

        $year   = strtok($date,'-');
        $month = strtok('-');
        $tgl   = strtok('-');

        $sumprice = $price * $duration;

        echo $id_room; echo "</br>";
        echo $id_user; echo "</br>";
        echo $id_pj; echo "</br>";
        echo $price; echo "</br>";
        echo $date; echo "</br>";
        echo $payment; echo "</br>";
        echo $duration; echo "</br>";
        echo $month; echo "</br>";
        echo $tgl; echo "</br>";
        echo $year; echo "</br>";
        echo $sumprice; echo "</br>";

        $order = new Order('');

        $result = $order->insertOrder($id_user,$id_room,$id_pj,$tgl,$month,$year,$duration,$payment,$sumprice);

        if($result){
            //get latest order_id
             $crud = new Crud();
             $result2 = $crud->getData("SELECT * FROM order_room ORDER BY id_order DESC LIMIT 1");
             $res = mysqli_fetch_assoc($result2);
             // echo "<script language='javascript'>alert('Order Successful !');</script>
              //  <script>document.location.href='../index.php';</script>";
              echo "<script>document.location.href='../checkout.php?id=".$res['id_order']."';</script>";
        }else{
                echo "<script language='javascript'>alert('Order Failed !');</script>
                <script>document.location.href='../index.php';</script>";
        }
    
    //if there is no data passed
    } else {
        echo "<script language='javascript'>alert('There is no data!');</script>
                <script>document.location.href='../index.php';</script>";
    }
?>