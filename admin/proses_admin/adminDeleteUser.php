<?php
session_start();
include_once "../../classes/Crud.php";
include_once "../../classes/Order.php";
include_once "../../classes/Mahasiswa.php";

$crud = new Crud();
$user = new Mahasiswa('');
$order = new Order(''); 

$id_user = $crud->escape_string($_GET['id']);
$result = $order->deleteOrderByUser($id_user);
$result2 = $user->deleteUser($id_user); 

if($result == $result2){
    ?>
      <script language="javascript">alert("Delete User Successful !");</script>
    <script>document.location.href='../index2.php';</script>
  <?php }else{
    ?>
    <script language="javascript">alert("failed delete room !");</script>
    <script>document.location.href='../index2.php';</script>
    <?php
     }
?>