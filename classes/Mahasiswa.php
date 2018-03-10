<?php 
	include_once 'Person.php';

	class Mahasiswa extends Person {
	
	public $departemen;
	public $nim;

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


	}


?>