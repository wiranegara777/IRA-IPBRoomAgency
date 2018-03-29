<?php
session_start();
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Mahasiswa.php");
include_once "classes/Room.php";

if(isset($_SESSION['name'])) {
 // echo "Your session is running " . $_SESSION['name'];    
     $Mahasiswa = new Mahasiswa($_SESSION['id']);
     echo "Your session is running " . $Mahasiswa->getName();
}else{
    echo '<script language="javascript">alert("Please Login First");</script>'; 
    echo '<script>document.location.href="login.php";</script>';
}
$crud = new Crud();
 
//fetching user with DESC order
$query = "SELECT * FROM user ORDER BY id DESC";
$result = $crud->getData($query);

// fetching room ASC order
$query = "SELECT * FROM room ORDER BY id_room ASC";
$result2 = $crud->getData($query);
?>
 
<html lang="en">
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
    </br></br>
    <h2>Room Avaiable</h2>
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>title</td>
        <td>Description</td>
        <td>address</td>
        <td>Image</td>
    </tr>
    <?php 
  //  foreach ($result as $key => $res) {
    while($res = mysqli_fetch_array($result2)) {         
        echo "<tr>";
        echo "<td>".$res['title']."</td>";
        echo "<td>".$res['body']."</td>";
        echo "<td>".$res['address']."</td>";
        echo "<td><img style='height:50px;' src='".$res['image']."'></td>";       
        //echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
    </table>
    <a href="proses/logout.php">keluar</a>
</body>

<!-- Chatra real time chat -->
<script>
    (function(d, w, c) {
        w.ChatraID = 'Nz3kSZ4tF5JhEjgMy';
        var s = d.createElement('script');
        w[c] = w[c] || function() {
            (w[c].q = w[c].q || []).push(arguments);
        };
        s.async = true;
        s.src = (d.location.protocol === 'https:' ? 'https:': 'http:')
        + '//call.chatra.io/chatra.js';
        if (d.head) d.head.appendChild(s);
    })(document, window, 'Chatra');
</script>

</html>