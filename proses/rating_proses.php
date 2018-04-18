<?php
        include_once("../classes/Crud.php");
    
        $crud = new Crud();

        if(isset($_POST['Submit'])){
        
                $id_user = $crud->escape_string($_POST['id_user']);
                $id_room = $crud->escape_string($_POST['id_room']);
          
                $rating = $crud->escape_string($_POST['rating']);
                $comment = $crud->escape_string($_POST['comment']);
            
            
            
            echo $id_user; echo "<br>";
            echo $id_room; echo "<br>";
            echo $rating; echo "<br>";
            echo $comment; echo "<br>";
            $result = $crud->execute("INSERT INTO rating(id_user,id_room,rating,comment) VALUES('$id_user','$id_room','$rating','$comment')");

             if ($result){
              echo "<script>alert('Berhasil menambah Rating !.');</script>
                <script>document.location.href='javascript:history.go(-1)';</script>";

             }   
            
            


        } else {
            echo "gagal";
        }
    ?>
