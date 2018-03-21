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
		
	public function insertPj($name,$email,$phone,$password){
		$crud = new Crud();
		$result = $crud->execute("INSERT INTO user(name,email,password,level) VALUES('$name','$email','$phone','$password',3)");

		return $result;
	}

	public function updatePj($id, $name,$email,$phone){
		$crud = new Crud();
		$result = $crud->execute("UPDATE user SET name='$name',email='$email' WHERE id=$id");
        
		return $result;
	}

	public function deletePj($id){
		$crud = new Crud();
		$result = $crud->execute("DELETE FROM user WHERE id=$id");
		
		return $result;
	}

	//insert Room

	public function insertRoom($title,$body,$image,$id_user,$lat,$long,$address){
		$crud = new Crud();
		$result = $crud->execute("INSERT INTO room
                  (id_user,title,body,address,image,lat,lng)
                         VALUES('$id_user','$title','$body','$address','img/$image','$lat','$long')");

		return $result;
	}

}


?>