<?php

	class Person {

		protected $id;
		protected $name;
		protected $email;
		protected $phone;

		public function setName($name){
			$this->name = $name;

		}
		
		public function setEmail($email){
			$this->email = $email;
		
		}

		public function setPhone($phone){
			$this->phone = $phone;
		
		}

		public function getName(){
			return $this->name;
		
		}

		public function getEmail(){
			return $this->email;
		
		}

		public function getPhone(){
			return $this->phone;
		
		}

		public function getId(){
			return $this->id;
		
		}


	}

?>