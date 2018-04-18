<?php 

    include_once "Crud.php";

    class Rating {

        protected $id_rating;
        protected $id_user;
        protected $id_room;
        protected $rating;
        protected $comment;

        public function Rating ($id_rating){
            if($id_rating != NULL){
                $crud = new Crud();
                $query = $crud->getData("SELECT * FROM rating where id_rating = '$id_rating'");
                $result = mysqli_fetch_assoc($query);

                $this->id_rating = $result['id_rating'];
                $this->id_user = $result['id_user'];
                $this->id_room = $result['id_room'];
                $this->rating = $result['rating'];
                $this->comment = $result['comment'];

            } else {
                $this->id_rating = NULL;
                $this->id_user = NULL;
                $this->id_room = NULL;
                $this->rating = NULL;
                $this->comment = NULL;


            }
        }

        //GETTER

        public function getId_rating(){
            return $this->id_rating;
        }
        public function getId_user(){
            return $this->id_user;
        }
        public function getId_room(){
            return $this->id_room;
        }
        public function getRating(){
            return $this->rating;
        }
        public function getComment(){
            return $this->comment;
        }

    }

?>