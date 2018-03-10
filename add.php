<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
session_start();
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Validation.php");
include_once("classes/Mahasiswa.php");
 
$crud = new Crud();
$validation = new Validation();
$Mahasiswa = new Mahasiswa($_SESSION['id'],$_SESSION['name'],$_SESSION['email'],$_SESSION['phone'],$_SESSION['departemen'],$_SESSION['nim']);

if(isset($_POST['Submit'])) {

    $name = $crud->escape_string($_POST['name']);
    $email = $crud->escape_string($_POST['email']);
    $nim = $crud->escape_string($_POST['nim']);
    $departemen = $crud->escape_string($_POST['departemen']);
    $password = $crud->escape_string($_POST['password']);
    

    $msg = $validation->check_empty($_POST, array('name', 'email','nim','departemen','password'));
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
    else { 
        // if all the fields are filled (not empty)            
        //insert data to database    
       $result = $Mahasiswa->insertUser($name,$nim,$email,$password,$departemen);
       // $result2 = $crud->execute("INSERT INTO user2(name,age,email) VALUES('$name','$age','$email')");
       
        //display success message
        if($result){
        echo "<font color='green'>Data added successfully.";
        }else{echo "gagal melakukan Input";}
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>