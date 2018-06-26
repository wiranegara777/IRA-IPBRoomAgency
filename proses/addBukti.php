<?php 
    include_once("../classes/Crud.php");
    include_once("../classes/Admin.php");
    include_once "../classes/Room.php";
    include_once "../classes/Order.php";

    session_start();

   $crud = new Crud();
?>
<?php
    if(isset($_POST['submit'])){
      
      $id_order  = $crud->escape_string($_POST['id_order']);
      echo $id_order;
      $foto_size  = $_FILES['image']['size'];
      $tipe_image = $_FILES['image']['type'];

      //image name
      $ext     = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
      $image   = date('mdYhia').'.'.$ext;

      $target  = "../img/".basename($image);

      if($tipe_image == "image/jpeg" || $tipe_image == "image/png"){
          if($foto_size < 1000000) {
                    if(move_uploaded_file($_FILES['image']['tmp_name'],"$target")){

                        $result = $crud->execute("UPDATE order_room SET bukti = 'img/$image' WHERE id_order = $id_order");

                       if($result){
                        ?>
                        	<script language="javascript">alert("Update Bukti Transfer Berhasil");</script>
                            <script>document.location.href='../index.php';</script>
                        <?php }else{
                          ?>
                          <script language="javascript">alert("Gagal Upload Bukti Transfer !");</script>
                          <script>document.location.href='../index.php';</script>
                          <?php
                           }
                         }
?>

      <?php
    } else {
    ?>
    <script language="javascript">alert("Ukuran Foto terlalu besar melebihi 1 MB");</script>
    <script>document.location.href='.';</script>
    <?php }
    } else { ?>
    <script language="javascript">alert("File bukan foto!");</script>
    <script>document.location.href='.';</script>
    <?php }
  
  }
?>