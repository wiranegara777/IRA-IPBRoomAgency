<?php 
    include_once "Crud.php";

    Class Room {
        //attribute
        protected $id_room;
        protected $id_user;
        protected $title;
        protected $body;
        protected $address;
        protected $image;
        protected $lat;
        protected $lng;
        
        //constructor
        public function Room($id_room){
            if($id_room != NULL){
                $crud = new Crud();
                $query = $crud->getData("SELECT * FROM room where id_room = '$id_room'");
                $result = mysqli_fetch_assoc($query);
                
                $this->id_room = $result['id_room'];
                $this->id_user = $result['id_user'];
                $this->title = $result['title'];
                $this->body = $result['body'];
                $this->address = $result['address'];
                $this->image = $result['image'];
                $this->lat = $result['lat'];
                $this->lng = $result['lng'];

            } else {
                $this->id_room = NULL;
                $this->id_user = NULL;
                $this->title = NULL;
                $this->body = NULL;
                $this->address = NULL;
                $this->image = NULL;
                $this->lat = NULL;
                $this->lng = NULL;
            }
        }

        //getter
        public function getId_room(){
            return $this->id_room;
        }

        public function getId_user(){
            return $this->id_user;
        }

        public function getTitle(){
            return $this->title;
        }

        public function getBody(){
            return $this->body;
        }

        public function getAddress(){
            return $this->address;
        }
        
        public function getImage(){
            return $this->image;
        }

        public function getLat(){
            return $this->lat;
        }

        public function getLng(){
            return $this->lng;
        }

        //insert room to database
        public function insertRoom($title,$body,$image,$id_user,$lat,$long,$address){
            $crud = new Crud();
                $result = $crud->execute("INSERT INTO room
                          (id_user,title,body,address,image,lat,lng)
                                 VALUES('$id_user','$title','$body','$address','img/$image','$lat','$long')");
            return $result;
        }

    }
?>