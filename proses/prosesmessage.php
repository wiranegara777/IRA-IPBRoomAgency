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
        //include_once("../classes/Validation.php");
     //   include_once("../classes/Admin.php");
        //include_once("../classes/Pj.php");

       // $admin = new Admin($_SESSION['id'],$_SESSION['name'],$_SESSION['email'],$_SESSION['phone']);
        $crud = new Crud();
        //$pj = new Pj('');
       // $validation = new Validation();

        if(isset($_POST['Submit'])){
            if($_POST['sender'] == 1){
                $id_user = $crud->escape_string($_POST['user1']);
                $id_pj = $crud->escape_string($_POST['user2']);
            } else {
                $id_user = $crud->escape_string($_POST['user2']);
                $id_pj = $crud->escape_string($_POST['user1']);
            }
            $conversation = $crud->escape_string($_POST['conversation']);
            $sender = $crud->escape_string($_POST['sender']);
            
            echo $id_user; echo "<br>";
            echo $id_pj; echo "<br>";
            echo $conversation; echo "<br>";
            echo $sender; echo "<br>";
            $result = $crud->execute("INSERT INTO message(id_user,id_pj,conversation,sender) VALUES('$id_user','$id_pj','$conversation','$sender')");

           // if ($result){
              //  echo "<script>alert('Berhasil mendaftar sebagai PJ Ruangan !.');
             //   document.location.href='../login.html';</script>";

           // }   
            
            


        }
    ?>
</body>
</html>