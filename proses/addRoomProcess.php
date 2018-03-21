<?php 
    include_once("../classes/Crud.php");
    include_once("../classes/Admin.php");
    session_start();
    if(isset($_SESSION['name'])) {
        $admin = new Admin($_SESSION['id'],$_SESSION['name'],$_SESSION['email'],$_SESSION['phone']);
   }else{
       echo '<script language="javascript">';
       echo 'alert("You Must Login First")';  //not showing an alert box.
       echo '</script>';
       echo '<script>document.location.href="../login.html";</script>';
   }
   $crud = new Crud();
?>
<?php
    if(isset($_POST['submit'])){
      //assigns Var
      $title    = $crud->escape_string($_POST['title']);
      $address  = $crud->escape_string($_POST['address']);
      $body     = $crud->escape_string($_POST['body']);
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
          
        //   $query = "INSERT INTO post
        //               (title,body,category,image,user_id,total_rating,validation,langtitude,longtitude,alamat,tanggal,bulan,tahun,date_finish,month_finish,year_finish)
        //                 VALUES('$title','$body', '$category','images/$image','$id_user','0','0','$lat','$long','$address','$tanggal','$bulan','$tahun','$tanggal2','$bulan2','$tahun2')";
         $query = $admin->insertRoom($title,$body,$image,$id_user,$lat,$long,$address);
         //$query = $crud->execute("INSERT INTO room (id_user,title,body,address,image,lat,lng) VALUES('$id_user','$title','$body','$address','img/$image','$lat','$long')");
        //  $insert_row = $db->insert($query);
            }
      if($tipe_image == "image/jpeg" || $tipe_image == "image/png"){
          if($foto_size < 1000000) {
                    if(move_uploaded_file($_FILES['image']['tmp_name'],"$target")){
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