<?php 
	include_once 'Person.php';
	include_once ("Crud.php");
	

	class Admin extends Person {
    
    public function Admin($id,$name,$email,$phone){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }
		

}


?>