<?php
session_start();
include_once("../classes/Crud.php");
include_once("../classes/Validation.php");
include_once("../classes/Mahasiswa.php");

$crud = new Crud();
$validation = new Validation();
 

if(isset($_POST['Submit'])){
    $email = $crud->escape_string($_POST['email']);
    $password = $crud->escape_string($_POST['password']);
    $password = md5($password);

    $check_email = $validation->is_email_valid($email);

   if (!$check_email) {
        echo "Please provide proper email.";
    }    
    else { 
        // if all the fields are filled (not empty) 
            
        //get user.data from database 
        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $query2 = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";  
        $result2 = $crud->getData($query2);
        if($result2->num_rows > 0){
            $admin=0;
            $result  = $crud->getData($query);
            $res = mysqli_fetch_array($result);
            
            $_SESSION['id'] = $res['id'];
            $_SESSION['name'] = $res['name'];
            $_SESSION['email'] = $res['email'];
            $_SESSION['phone'] = $res['phone'];
            
            if($res['level'] == 2)
                {
                    $_SESSION['departemen'] = $res['departemen'];
                    $_SESSION['nim'] = $res['nim'];
                }
            else if($res['level'] == 1)
                    $admin=1;
            
             echo '<script language="javascript">alert("Login Successful");</script>'; 
             
             if($admin==1)
                 echo '<script>document.location.href="../admin/index.php";</script>';
             else
                 echo '<script>document.location.href="../index.php";</script>';

        }else
        {
            ?>
            <!-- <script language="javascript">alert("Login Failed");</script> -->
            <script>document.location.href='../login.php?err=1';</script>
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
