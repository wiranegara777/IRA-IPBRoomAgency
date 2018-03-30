<?php 
	include_once 'Person.php';
	include_once ("Crud.php");
	

	class Admin extends Person {
    
    public function Admin($id){
        if($id != NULL){
            $crud = new Crud();
            $query = $crud->getData("SELECT * FROM user where id = '$id'");
            $result = mysqli_fetch_assoc($query);

            $this->id = $result['id'];
            $this->name = $result['name'];
            $this->email = $result['email'];
            $this->phone = $result['phone'];
        } else {
            $this->id = NULL;
            $this->name = NULL;
            $this->email = NULL;
            $this->phone = NULL;
        }
    }
		

}


?>