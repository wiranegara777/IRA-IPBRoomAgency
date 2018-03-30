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
      //target direktori tempat nyimpen gambar
      //$target     = "../images/".basename($_FILES['image']['name']);
      $foto_size  = $_FILES['image']['size'];
      $tipe_image = $_FILES['image']['type'];
      //nama gambar
      //$image = $_FILES['image']['name'];
      $ext     = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
      $image   = date('mdYhia').'.'.$ext;
      $target  = "../img/".basename($image);
      $id_user = $admin->getId();
      $lat     = $crud->escape_string($_POST['lat']);
      $long    = $crud->escape_string($_POST['long']);

    //   //Simple validation
      if($title == ''|| $body == '' ){
          //set error
          $error = 'Isi semua atribut!';
          echo $error;
      }else {
              // do nothing        
            }
      if($tipe_image == "image/jpeg" || $tipe_image == "image/png"){
          if($foto_size < 1000000) {
                    if(move_uploaded_file($_FILES['image']['tmp_name'],"$target")){
                          $query = $room->insertRoom($title,$body,$image,$id_user,$lat,$long,$address,$price);
                       if($query){
                         // $query77 = mysqli_query($conn,"INSERT INTO notif (pesan,id_user) values ('Event Successfully uploaded','$id_user')");
                          //$query77 = mysqli_query($conn,"INSERT INTO notif (pesan,id_user) values ('Waiting Confirmation from Admin','$id_user')");
                        ?>
                        	<script language="javascript">alert("Adding Room Successful !");</script>
                          <script>document.location.href='../admin_dash.php';</script>
                        <?php }else{
                          ?>
                          <script language="javascript">alert("failed making room !");</script>
                          <!-- <script>document.location.href='../admin_dash.php';</script> -->
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
   // mysqli_close($conn);
  }
?>