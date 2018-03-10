<?php
session_start();
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Mahasiswa.php"); 

$crud = new Crud();
$Mahasiswa = new Mahasiswa($_SESSION['id'],$_SESSION['name'],$_SESSION['email'],$_SESSION['phone'],$_SESSION['departemen'],$_SESSION['nim']);
 
//getting id of the data from url
$id = $crud->escape_string($_GET['id']);
 
//deleting the row from table
//$result = $crud->execute("DELETE FROM users WHERE id=$id");
//$result = $crud->delete($id, 'users');
$result = $Mahasiswa->deleteUser($id);
 
if ($result) {
    //redirecting to the display page (index.php in our case)
    echo 'berhasil hapus record';
    header("Location:index.php");
}
?>