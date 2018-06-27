<?php
session_start();
include_once "../../classes/Crud.php";
include_once "../../classes/Order.php";
include_once "../../classes/Mahasiswa.php";

$crud = new Crud();
$user = new Mahasiswa('');
$order = new Order(''); 

$id_user = $_GET['id_order'];
$result = $order->deleteOrder($id_user); 

?>

<script language="javascript">alert("Success delete order !");</script>
<script>document.location.href='../index.php';</script>
    