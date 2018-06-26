<?php
    include "../classes/Crud.php";

    $crud = new Crud();
    $id_order = $_GET['id'];

    $result = $crud->execute("UPDATE order_room SET status = 'finish' WHERE id_order = $id_order");

    if($result){
     ?>
         <script language="javascript">alert("Update Status Order Berhasil");</script>
         <script>document.location.href='../admin_dash.php';</script>
     <?php }else{
       ?>
       <script language="javascript">alert("Gagal Update Status Order !");</script>
       <script>document.location.href='../admin_dash.php';</script>
       <?php
        }

?>