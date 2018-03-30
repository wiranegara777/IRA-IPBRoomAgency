<?php
    session_start();
    include_once "classes/Crud.php";
    include_once "classes/Room.php";

    $crud = new Crud();

    //get room with specified id
    $id = $crud->escape_string($_GET['id']);

    //get room
    $room = new Room($id);
    
?>

<html>
    <title></title>
    <body>
        <table>
            <tr bgcolor='#CCCCCC'>
                <td>title</td>
                <td>Description</td>
                <td>address</td>
                <td>Image</td>
                <td></td>
            </tr>
            <tr bgcolor='#CCCCCC'>
                <td><?php echo $room->getTitle(); ?></td>
                <td><?php echo $room->getBody(); ?></td>
                <td><?php echo $room->getAddress(); ?></td>
                <td><img style="height:350px;" src="<?php echo $room->getImage(); ?>"/></td>
                <td></td>
             </tr>
        </table>

        <div style="width:400px;">
            <?php include_once "calendar.php"; ?>
        </div>
    </body>
</html>