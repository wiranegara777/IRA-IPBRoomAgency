<?php
session_start();
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Mahasiswa.php");


if(isset($_SESSION['departemen'])) {
 // echo "Your session is running " . $_SESSION['name'];
     $Mahasiswa = new Mahasiswa($_SESSION['id'],$_SESSION['name'],$_SESSION['email'],$_SESSION['phone'],$_SESSION['departemen'],$_SESSION['nim']);
     echo "Your session is running " . $Mahasiswa->getName();
}else{
    echo '<script language="javascript">alert("Please Login First");</script>'; 
    echo '<script>document.location.href="login.php";</script>';
}
$crud = new Crud();
 
//fetching data in descending order (lastest entry first)
$query = "SELECT * FROM user ORDER BY id DESC";
$result = $crud->getData($query);
//echo '<pre>'; print_r($result); exit;
?>
 
<html>
<head>    
    <title>Homepage</title>
</head>
 
<body>
<a href="add.html">Add New Data</a><br/><br/>
 
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Age</td>
        <td>Email</td>
        <td>Update</td>
    </tr>
    <?php 
  //  foreach ($result as $key => $res) {
    while($res = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['nim']."</td>";
        echo "<td>".$res['email']."</td>";    
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
    </table>
    <a href="proses/logout.php">keluar</a>
</body>
</html>