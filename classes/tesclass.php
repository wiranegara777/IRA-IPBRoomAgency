<?php

include_once 'Mahasiswa.php';

$Mahasiswa = new Mahasiswa(1,"wira","email@mal","0808080","ILKOM","G64150058");

echo $Mahasiswa->getName(). "<br />";
echo $Mahasiswa->getEmail(). "<br />";
echo $Mahasiswa->getPhone(). "<br />";
echo $Mahasiswa->getDepartemen(). "<br />";
echo $Mahasiswa->getNim();

?>