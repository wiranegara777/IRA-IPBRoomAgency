<?php
session_start();
//including the database connection file
include_once("classes/Crud.php");
include_once("classes/Mahasiswa.php");
include_once "classes/Room.php";
include_once "classes/Pj.php";

if(isset($_SESSION['name'])) {
 // echo "Your session is running " . $_SESSION['name'];    
     $Mahasiswa = new Mahasiswa($_SESSION['id']);
    // echo "Your session is running " . $Mahasiswa->getName();
}else{
    echo '<script language="javascript">alert("Please Login First");</script>'; 
    echo '<script>document.location.href="login.php";</script>';
}
$crud = new Crud();
 
//fetching user with DESC order
$query = "SELECT * FROM user ORDER BY id DESC";
$result = $crud->getData($query);

?>
 
<html lang="en">
<head>    
    <title>Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- JQUERY -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
    <!--  bootstrap js -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
 
<body>
<!-- Nav bar -->
<?php include_once "include/navbar.php";  ?>
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
    <!-- list of dynamic room -->
    <div id ="ulang"></div>

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

<!-- jquery to refresh every second -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">// <![CDATA[
    $(document).ready(function() {
        $.ajaxSetup({ cache: false }); // This part addresses an IE bug. without it, IE will only load the first number and will never refresh
        setInterval(function() {
            $('#ulang').load('tesup.php');
        }, 500); // the "3000" here refers to the time to refresh the div. it is in milliseconds.
});
// ]]></script>

</html>