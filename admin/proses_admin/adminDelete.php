<?php
session_start();
include_once "../../classes/Crud.php";
include_once "../../classes/Room.php";
include_once "../../classes/Order.php";

$crud = new Crud();
$room = new Room('');
$order = new Order(''); 

$id_room = $crud->escape_string($_GET['id']);
$result = $order->deleteOrderByRoom($id_room);
$result2 = $room->deleteRoom($id_room); 

if($result == $result2){
    ?>
      <script language="javascript">alert("Delete Room Successful !");</script>
    <script>document.location.href='../index3.php';</script>
  <?php }else{
    ?>
    <script language="javascript">alert("failed delete room !");</script>
    <script>document.location.href='../index3.php';</script>
    <?php
     }
?>