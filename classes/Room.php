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
        protected $image2;
        protected $image3;
        protected $lat;
        protected $lng;
        protected $price;
        protected $fakultas;
        protected $fasilitas;
        protected $kapasitas;

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
                $this->image2 = $result['image2'];
                $this->image3 = $result['image3'];
                $this->lat = $result['lat'];
                $this->lng = $result['lng'];
                $this->price = $result['price'];
                $this->fakultas = $result['fakultas'];
                $this->kapasitas = $result['kapasitas'];
                $this->fasilitas = $result['fasilitas'];
               

            } else {
                $this->id_room = NULL;
                $this->id_user = NULL;
                $this->title = NULL;
                $this->body = NULL;
                $this->address = NULL;
                $this->image = NULL;
                $this->image2 = NULL;
                $this->image3 = NULL;
                $this->lat = NULL;
                $this->lng = NULL;
                $this->price = NULL;
                $this->fakultas = NULL;
                $this->kapasitas = NULL;
                $this->fasilitas = NULL;
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

        public function getImage2(){
            return $this->image2;
        }

        public function getImage3(){
            return $this->image3;
        }

        public function getLat(){
            return $this->lat;
        }

        public function getLng(){
            return $this->lng;
        }

        public function getPrice(){
            return $this->price;
        }

        public function getFasilitas(){
            return $this->fasilitas;
        }

        public function getKapasitas(){
            return $this->kapasitas;
        }

        public function getFakultas(){
            return $this->fakultas;
        }

        //insert room to database
        public function insertRoom($title,$body,$image,$image2,$image3,$id_user,$lat,$long,$address,$price,$fasilitas,$fakultas,$kapasitas){
            $crud = new Crud();
                $result = $crud->execute("INSERT INTO room
                          (id_user,title,body,address,image,image2,image3,lat,lng,price,fasilitas,fakultas,kapasitas)
                                 VALUES('$id_user','$title','$body','$address','img/$image','img/$image2','img/$image3','$lat','$long','$price','$fasilitas','$fakultas','$kapasitas')");
            return $result;
        }

        public function deleteRoom($id_room) {
            $crud = new Crud();

            $result = $crud->execute("DELETE FROM room WHERE id_room=$id_room");

            return $result;
        }

    }
?>