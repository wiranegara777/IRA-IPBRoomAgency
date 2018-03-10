<?php
// including the database connection file
include_once("classes/Crud.php");
 
$crud = new Crud();
 
//getting id from url
$id = $crud->escape_string($_GET['id']);
 
//selecting data associated with this particular id
$result = $crud->getData("SELECT * FROM user WHERE id=$id");
 
foreach ($result as $res) {
    $name = $res['name'];
    $nim = $res['nim'];
    $email = $res['email'];
    $departemen = $res['departemen'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editaction.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Nim</td>
                <td><input type="text" name="nim" value="<?php echo $nim;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
             <tr> 
                <td>Departemen</td>
                <td><input type="text" name="departemen" value="<?php echo $departemen;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>