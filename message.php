<?php 

session_start();
include_once "classes/Crud.php";
include_once "classes/order.php";
include_once "classes/Room.php";
include_once "classes/Mahasiswa.php";
include_once "classes/Pj.php";

$id = $_SESSION['id'];
$crud = new Crud();

$id_pj = $_GET['id_pj'];
$_SESSION['pj'] = $id_pj;
//cek siapa yg login apakah mahasiwa?
$student = new Mahasiswa($id);
if ($student->getLevel() == 2)
        $sender = 1;
else    
        $sender = 0;
?>

<html>
    <head>
        <title>Conversations</title>
    </head>
    <body>
        
        <div id = "ulang"></div>

    <form action="proses/prosesmessage.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>Chat</td>
                <td><input type="text" name="conversation"></td>
            </tr>
            <td><input type="hidden" name="user1" value="<?php echo $id;?>"></td>
            <td><input type="hidden" name="user2" value="<?php echo $id_pj;?>"></td>
            <td><input type="hidden" name="sender" value="<?php echo $sender;?>"></td>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Send"></td>
            </tr>
        </table>
    </form>
    </body>
</html>

<!-- jquery to refresh every second -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">// <![CDATA[
    $(document).ready(function() {
        $.ajaxSetup({ cache: false }); // This part addresses an IE bug. without it, IE will only load the first number and will never refresh
        setInterval(function() {
            $('#ulang').load('automessage.php');
        }, 500); // the "3000" here refers to the time to refresh the div. it is in milliseconds.
});
// ]]></script>