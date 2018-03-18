<?php
session_start();
// including the database connection file
include_once("classes/Crud.php");
include_once("classes/Validation.php");
include_once("classes/Mahasiswa.php"); 

$crud = new Crud();
$validation = new Validation();
$Mahasiswa = new Mahasiswa($_SESSION['id'],$_SESSION['name'],$_SESSION['email'],$_SESSION['phone'],$_SESSION['departemen'],$_SESSION['nim']);

if(isset($_POST['update']))
{    
    $id = $crud->escape_string($_POST['id']);
    
    $name = $crud->escape_string($_POST['name']);
    $nim = $crud->escape_string($_POST['nim']);
    $email = $crud->escape_string($_POST['email']);
    $departemen = $crud->escape_string($_POST['departemen']);

    $msg = $validation->check_empty($_POST, array('name', 'email'));
    $check_email = $validation->is_email_valid($_POST['email']);
    
    // checking empty fields
    if($msg) {
        echo $msg;        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } elseif (!$check_email) {
        echo 'Please provide proper email.';    
    } else {    
        //updating the table
       // $result = $crud->execute("UPDATE users SET name='$name',age='$age',email='$email' WHERE id=$id");
        $result = $Mahasiswa->updateUser($id, $name,$nim,$email,$departemen);

        if($result){
            echo "Berhasil Update Record";
        }else {
        //redirectig to the display page. In our case, it is index.php
        echo 'Gagal Update Record';
        header("Location: index.php");
        }
    }
}
?>