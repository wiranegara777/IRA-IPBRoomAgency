<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//including the database connection file
include_once("../classes/Crud.php");
include_once("../classes/Validation.php");
//include_once("classes/Mahasiswa.php");
 
$crud = new Crud();
$validation = new Validation();
//$Mahasiswa = new Mahasiswa($_SESSION['id'],$_SESSION['name'],$_SESSION['email'],$_SESSION['phone'],$_SESSION['departemen'],$_SESSION['nim']);

if(isset($_POST['Submit'])) {

    $name = $crud->escape_string($_POST['name']);
    $email = $crud->escape_string($_POST['email']);
    $nim = $crud->escape_string($_POST['nim']);
    $fakultas = $crud->escape_string($_POST['fakultas']);
    $departemen = $crud->escape_string($_POST['departemen']);
   // $departemen = '1';
    $password = $crud->escape_string($_POST['password']);
    $password2 = $crud->escape_string($_POST['password2']);
    $angkatan = $crud->escape_string($_POST['angkatan']);
    $phone = $crud->escape_string($_POST['phone']);
    $pass = $password;
    $password = md5($password);  
    $msg = $validation->check_empty($_POST, array('name', 'email','nim','departemen','password','fakultas','angkatan','phone'));
  //  $check_age = $validation->is_age_valid($_POST['age']);
    $check_email = $validation->is_email_valid($_POST['email']);
    
    // checking empty fields
    if($msg != null) {
        echo $msg;        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    }  elseif (!$check_email) {
        echo 'Please provide proper email.';
    }    
    elseif ($pass == $password2) { 
       
        date_default_timezone_set('Asia/Jakarta');
          //include 'phpmailer/PHPMailerAutoload.php';
          require_once "../vendor/autoload.php";

          $mail = new PHPMailer(); // create a new object
          $mail->IsSMTP(); // enable SMTP
          $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
          $mail->SMTPAuth = true; // authentication enabled
          //$mail->SMTPSecure = 'tls'; // secure transfer 
          $mail->Host = "smtp.gmail.com";
          $mail->IsHTML(true);
          $mail->Port = 587; //465; // or 587
          $mail->Username = "ipbroomagency@gmail.com";
          $mail->Password = "qwerty1p8";
          $mail->setFrom('ipbira@gmail.com', 'IPB Room Agency, Ltd');

          //ini buat offline 
          $mail->smtpConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                        )
                    )
                );

          $mail->addAddress($email);
          $mail->Subject = "[BERHASIL] Pendaftaran Akun Baru IRA";
          $pesan = "<img style='width:20%;' src='https://upload.wikimedia.org/wikipedia/id/thumb/c/cb/Logo_IPB.svg/1024px-Logo_IPB.svg.png'><br><br>

          Yth. ".$name." <br><br><br> Terima kasih telah Menggunakan layanan IRA.
              <br>Berikut kami kirimkan detil informasi anda : <br><br><b>URL Login</b> : <a href='http://pestasains.ipb.ac.id/pesta2017/dashboard/masuk'>Log In</a>
              <br> <b>Username</b> : ". $name."
              <br> <b>Password</b> : ". $pass."
              <br>
          <b>Simpan Email ini untuk mengantisipasi Lupa Password/Username</b>
          <br><br>
          Bila ada kesulitan silahkan menghubungi kami
          <br><br>
          Sampai jumpa di Kampus IPB.";
          //$mail->Body = preg_replace('/\[\]/','',$pesan);
          $mail->Body = $pesan;

          if (!$mail->send()) {
              echo "<script>alert('Error " . $mail->ErrorInfo . "')</script>";
          }
          else { // $result3=mysqli_multi_query($con,$sql3);
                $crud->execute("INSERT INTO user(name,nim,email,password,departemen,level,fakultas,angkatan,phone) VALUES('$name','$nim','$email','$password','$departemen',2,'$fakultas','$angkatan','$phone')");
                echo "<script>alert('Berhasil mendaftar sebagai peserta! Silahkan cek email anda.');
                document.location.href='../login.php';</script>";
            }
    
    }  else {
        echo "<script>alert('Salah memasukkan password');
                document.location.href='../login.php';</script>";
    }
}
?>
</body>
</html>