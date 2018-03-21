<?php 
	include_once 'Person.php';
	include_once("Crud.php");
	

	class Mahasiswa extends Person {
	
	protected $departemen;
	protected $nim;

	public function Mahasiswa($id, $name, $email, $phone, $departemen, $nim){
	 	$this->id = $id;
	 	$this->name = $name;
	 	$this->email = $email;
	 	$this->phone = $phone;
	 	$this->departemen = $departemen;
	 	$this->nim = $nim;
	 }
	
	public function setDepartemen($departemen){
			$this->departemen = $departemen;
		
		}

	public function getDepartemen(){
			return $this->departemen;
		
		}

	public function setNim($nim){
			$this->nim = $nim;
		
		}

	public function getNim(){
			return $this->nim;
		
		}

	public function insertUser($name,$nim,$email,$password,$departemen){
		$crud = new Crud();
		$result = $crud->execute("INSERT INTO user(name,nim,email,password,departemen) VALUES('$name','$nim','$email','$password','$departemen')");

		return $result;
	}

	public function updateUser($id, $name,$nim,$email,$departemen){
		$crud = new Crud();
		$result = $crud->execute("UPDATE user SET name='$name',nim='$nim',email='$email',departemen = '$departemen' WHERE id=$id");
        
		return $result;
	}

	public function deleteUser($id){
		$crud = new Crud();
		$result = $crud->execute("DELETE FROM user WHERE id=$id");
		
		return $result;
	}

}


?>