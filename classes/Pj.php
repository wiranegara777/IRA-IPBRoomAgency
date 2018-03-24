<?php 
include_once "Crud.php";
include_once "Person.php";

    Class Pj extends Person{

      //  public function __contruct($id_user){
          public function Pj($id_user){
            if($id_user != NULL){
                $crud = new Crud();
                $query = $crud->getData("SELECT * FROM user where id = '$id_user'");
                $result = mysqli_fetch_array($query);

                $this->id = $result['id'];
                $this->name = $result['name'];
                $this->email = $result['email'];
                //$this->password = $result['nim'];
                $this->phone = $result['phone'];
            } else {
                $this->id = NULL;
                $this->name = NULL;
                $this->email = NULL;
                //$this->password = $result['nim'];
                $this->phone = NULL;
            }
        }

        public function insertPj($name,$email,$phone,$password){
            $crud = new Crud();
            $result = $crud->execute("INSERT INTO user(name,email,phone,password,level) VALUES('$name','$email','$phone','$password',3)");
    
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

    }

?>