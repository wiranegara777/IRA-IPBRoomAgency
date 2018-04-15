<html lang="en">
    <head>
        <title>NotifPesan</title>
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
<?php 

    session_start();
    include_once "classes/Crud.php";
    include_once "classes/order.php";
    include_once "classes/Room.php";
    include_once "classes/Mahasiswa.php";
    include_once "classes/Pj.php";

    $id = $_SESSION['id'];

    $crud = new Crud();
    $student = new Mahasiswa($id);
    if ($student->getLevel() == 2)
        $query = "SELECT * FROM message where id_user = $id GROUP by id_pj,id_user";
    else    
        $query = "SELECT * FROM message where id_pj = $id GROUP by id_pj,id_user";

    $result = $crud->getData($query);

    if($result->num_rows > 0){
        echo "<ul class='list-group'>";
        while($res = mysqli_fetch_array($result)) { 
            $mahasiswa = new Mahasiswa($res['id_user']);
            $pj = new Pj($res['id_pj']);  
                if($student->getLevel() == 2){
                    echo "<li class='list-group-item active'>".$pj->getName()."</li>";
                    echo "<li class ='list-group-item'>".$res['conversation']."</li>";
                    echo "<a href='message.php?id_pj=".$res['id_pj']."'> Read More </a> </br>";
                }else{
                    echo "<li class='list-group-item active'>".$mahasiswa->getName()."</li>";
                    echo "<li class ='list-group-item'>".$res['conversation']."</li> </br>";
                    echo "<a href='message.php?id_pj=".$res['id_user']."'>Read More</a> </br>";
                }            
        }
        echo "</ul>";
        //end of while
    }else{
        echo "Anda tidak memiliki Pesan";
    }
    
?>
    </body>
</html>