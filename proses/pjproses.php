<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Data PJ</title>
</head>
<body>
    <?php
        session_start();
        include_once("../classes/Crud.php");
        include_once("../classes/Validation.php");
     //   include_once("../classes/Admin.php");
        include_once("../classes/Pj.php");

       // $admin = new Admin($_SESSION['id'],$_SESSION['name'],$_SESSION['email'],$_SESSION['phone']);
        $crud = new Crud();
        $pj = new Pj('');
        $validation = new Validation();

        if(isset($_POST['Submit'])){
            $name = $crud->escape_string($_POST['name']);
            $email = $crud->escape_string($_POST['email']);
            $phone = $crud->escape_string($_POST['phone']);
            $password = $crud->escape_string($_POST['password']);
            $pass = $password;
            $password = md5($password);

            $msg = $validation->check_empty($_POST, array('name', 'email','phone','password'));
            $check_email = $validation->is_email_valid($_POST['email']);

            if($msg != null) {
                echo $msg;        
                //link to the previous page
                echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
            }  elseif (!$check_email) {
                echo 'Please provide proper email.';
            }
            else{
               $pj -> insertPj($name, $email, $phone, $password);
                echo "<script>alert('Berhasil mendaftar sebagai PJ Ruangan !.');
                document.location.href='../login.html';</script>";

            } 


        }
    ?>
</body>
</html>