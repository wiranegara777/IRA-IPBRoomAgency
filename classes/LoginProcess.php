<?php
session_start();
include_once("Crud.php");
include_once("Validation.php");
include_once("Mahasiswa.php");

$crud = new Crud();
$validation = new Validation();
 

if(isset($_POST['Submit'])){
    $email = $crud->escape_string($_POST['email']);
    $password = $crud->escape_string($_POST['password']);

    $check_email = $validation->is_email_valid($email);

   if (!$check_email) {
        echo "Please provide proper email.";
    }    
    else { 
        // if all the fields are filled (not empty) 
            
        //insert data to database  
        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";  
        if($query == TRUE){
            
            $result  = $crud->getData($query);
            $res = mysqli_fetch_array($result);
            
            $_SESSION['id'] = $res['id'];
            $_SESSION['name'] = $res['name'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['phone'] = $res['phone'];
            $_SESSION['departemen'] = $res['departemen'];
            $_SESSION['nim'] = $res['nim'];
            
           // $Mahasiswa = new Mahasiswa($res['id'],$res['name'],$res['email'],$res['phone'],$res['departemen'],$res['nim']);

             ?>
             <script language="javascript">alert("Login Successful");</script>
             <script>document.location.href='../index.php';</script>

             <?php
             //echo $_SESSION['status'];
        }else
        {
            ?>
            <script language="javascript">alert("Login Failed");</script>
            <script>document.location.href='../login.html';</script>
            <?php
        }
       
        
    }
} else 
{
    ?>
        <script language="javascript">alert("Data Ga Masuk");</script>
        <script>document.location.href='../login.html';</script>
    <?php
}

?>
