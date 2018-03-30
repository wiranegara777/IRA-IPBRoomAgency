<?php include_once("classes/Crud.php"); 
    $crud = new Crud();
?>
</table >
    </br></br>
    <h2>Room Avaiable</h2>
    <table width='80%' border=0>
 
    <tr bgcolor='#CCCCCC'>
        <td>title</td>
        <td>Description</td>
        <td>address</td>
        <td>Image</td>
        <td></td>
    </tr>
    <?php
    // fetching room ASC order
    $query = "SELECT * FROM room ORDER BY id_room ASC";
    $result2 = $crud->getData($query); 
  //  foreach ($result as $key => $res) {
    while($res = mysqli_fetch_array($result2)) {         
        echo "<tr>";
        echo "<td>".$res['title']."</td>";
        echo "<td>".$res['body']."</td>";
        echo "<td>".$res['address']."</td>";
        echo "<td><img style='height:50px;' src='".$res['image']."'></td>";
        echo "<td><a href='detailroom.php?id=".$res['id_room']."'><button>View</button></a></td>";       
        //echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";        
    }
    ?>
    </table>