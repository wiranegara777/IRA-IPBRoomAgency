<?php 
    include_once("../classes/Crud.php");
    include_once("../classes/Admin.php");
    include_once "../classes/Room.php";

    session_start();
    if(isset($_SESSION['name'])) {
        $admin = new Admin($_SESSION['id']);
   }else{
       echo '<script language="javascript">';
       echo 'alert("You Must Login First")';  //not showing an alert box.
       echo '</script>';
       echo '<script>document.location.href="../login.html";</script>';
   }
   $crud = new Crud();
   $room = new Room('');
?>
<?php
    if(isset($_POST['submit'])){
      //assigns Var
      $title    = $crud->escape_string($_POST['title']);
      $address  = $crud->escape_string($_POST['address']);
      $body     = $crud->escape_string($_POST['body']);
      $price    = $crud->escape_string($_POST['price']);
      $id_room = $_POST['id_room'];  
      $check_image = $_FILES['image']['name'];
      //target direktori tempat nyimpen gambar
      //$target     = "../images/".basename($_FILES['image']['name']);
      $foto_size  = $_FILES['image']['size'];
      $tipe_image = $_FILES['image']['type'];
      //nama gambar
      //$image = $_FILES['image']['name'];
      $ext     = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
      $image   = date('mdYhia').'.'.$ext;

     // $ext2     = pathinfo($_FILES['image2']['name'], PATHINFO_EXTENSION);
      $image2   = basename($_FILES["image2"]["name"]);

    //  $ext3     = pathinfo($_FILES['image3']['name'], PATHINFO_EXTENSION);
      $image3   = basename($_FILES["image3"]["name"]);

      $target  = "../img/".basename($image);
      $target2  = "../img/".basename($image2);
      $target3  = "../img/".basename($image3);

      $id_user = $admin->getId();
      $lat     = $crud->escape_string($_POST['lat']);
      $long    = $crud->escape_string($_POST['long']);

      $fakultas  = $crud->escape_string($_POST['fakultas']);
      $fasilitas = $crud->escape_string($_POST['fasilitas']);
      $kapasitas = $crud->escape_string($_POST['kapasitas']);

    //   //Simple validation
      if($title == ''|| $body == '' ){
          //set error
          $error = 'Isi semua atribut!';
          echo $error;
      }else {
              // do nothing        
            }
            if($check_image != '') {
      if($tipe_image == "image/jpeg" || $tipe_image == "image/png"){
          if($foto_size < 1000000) {
                    if(move_uploaded_file($_FILES['image']['tmp_name'],"$target")){
                          move_uploaded_file($_FILES['image2']['tmp_name'],"$target2");
                          move_uploaded_file($_FILES['image3']['tmp_name'],"$target3");
                          
                          $query = $crud->execute("UPDATE room SET
                          id_user = '$id_user' ,title = '$title',body = '$body' ,address = '$address',image = 'img/$image',image2 = 'img/$image',image3 = 'img/$image',lat = '$lat',lng = '$long',price = '$price',fasilitas = '$fasilitas',fakultas = '$fakultas',kapasitas = '$kapasitas'
                                WHERE id_room = $id_room");
            
                          
                       if($query){
                          ?>
                        	<script language="javascript">alert("Update Room Successful !");</script>
                          <script>document.location.href='../admin_dash.php';</script>
                        <?php }else{
                          ?>
                          <script language="javascript">alert("failed update room !");</script>
                          <script>document.location.href='../admin_dash.php';</script>
                          <?php
                           }
                         }
                    
?>

      <?php
    } else {
    ?>
    <script language="javascript">alert("Ukuran Foto terlalu besar melebihi 1 MB");</script>
    <script>document.location.href='../admin_dash.php';</script>
    <?php }
    } else { ?>
    <script language="javascript">alert("File bukan foto!");</script>
    <script>document.location.href='../admin_dash.php';</script>
    <?php }

    } else {

        $query = $crud->execute("UPDATE room SET
        id_user = '$id_user' ,title = '$title',body = '$body' ,address = '$address',lat = '$lat',lng = '$long',price = '$price',fasilitas = '$fasilitas',fakultas = '$fakultas',kapasitas = '$kapasitas'
              WHERE id_room = $id_room");

        
     if($query){
        ?>
          <script language="javascript">alert("Updating Room Successful !");</script>
        <script>document.location.href='../admin_dash.php';</script>
      <?php }else{
        ?>
        <script language="javascript">alert("failed update room !");</script>
        <script>document.location.href='../admin_dash.php';</script>
        <?php
         }

       }



    }
   // mysqli_close($conn);
  
?>