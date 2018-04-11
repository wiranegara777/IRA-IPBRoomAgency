    <ul>
<?php
            
            session_start();
            include_once "classes/Crud.php";
            include_once "classes/order.php";
            include_once "classes/Room.php";
            include_once "classes/Mahasiswa.php";
            include_once "classes/Pj.php";

            $id = $_SESSION['id'];
            $crud = new Crud();

            $id_pj = $_SESSION['pj'];

            //cek siapa yg login
            $student = new Mahasiswa($id);
            if ($student->getLevel() == 2)
                    $sender = 1;
            else    
                    $sender = 0;

            $query = "SELECT * from message where id_user = $id and id_pj = $id_pj";
            $result = $crud->getData($query);
            //cek apakah ada conversations
            if($result->num_rows > 0){
              //  $order = new Order($res['id_order']);
              $user = new Mahasiswa($id);
              //  $room = new Room($order->getId_room());
                $pj = new Pj($id_pj);
              while($res = mysqli_fetch_array($result)) {
                  if($res['sender'] == 1){
            ?>
                <p style="color:red;"> <?php echo $user->getName(); ?> </p>
                <p> <?php echo $res['conversation'] ?> </p>
            <?php
                  } else {
        ?>
            <li>
                <p> <?php echo $pj->getName(); ?> </p>
                <p> <?php echo $res['conversation'] ?> </p>
            </li>
        <?php }
            //end of sender checker 
            }
            //end of while 
        } else { echo "Anda belum Memulai Conversations"; }
        //end of if
        ?>
        </ul>