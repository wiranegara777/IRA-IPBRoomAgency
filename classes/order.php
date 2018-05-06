<?php 

    include_once "Crud.php";

    class Order {

        protected $id_order;
        protected $id_user;
        protected $id_room;
        protected $id_pj;
        protected $tgl;
        protected $month;
        protected $year;
        protected $duration;
        protected $payment;
        protected $sum_price;
        protected $status;
        protected $dateCreated;

        public function Order($id_order){
            if($id_order != NULL){
                $crud = new Crud();
                $query = $crud->getData("SELECT * FROM order_room where id_order = '$id_order'");
                $result = mysqli_fetch_assoc($query);

                $this->id_order = $result['id_order'];
                $this->id_user = $result['id_user'];
                $this->id_room = $result['id_room'];
                $this->id_pj = $result['id_pj'];
                $this->tgl = $result['date'];
                $this->month = $result['month'];
                $this->year = $result['year'];
                $this->duration = $result['duration'];
                $this->payment = $result['payment'];
                $this->sum_price = $result['sum_price'];
                $this->status = $result['status'];
                $this->dateCreated = $result['dateCreated'];
            }else{
                $this->id_order = NULL;  
                $this->id_user = NULL;  
                $this->id_room = NULL;  
                $this->id_pj = NULL;  
                $this->tgl = NULL;  
                $this->month = NULL;  
                $this->year = NULL;  
                $this->duration = NULL;  
                $this->payment = NULL;  
                $this->sum_price = NULL;    
                $this->status = NULL;
                $this->dateCreated = NULL;
            }
        }

        //getter

        public function getId_user(){
            return $this->id_user;
        }
        public function getId_pj(){
            return $this->id_pj;
        }
        public function getId_room(){
            return $this->id_room;
        }
        public function getTgl(){
            return $this->tgl;
        }
        public function getMonth(){
            return $this->month;
        }
        public function getYear(){
            return $this->year;
        }
        public function getDuration(){
            return $this->duration;
        }
        public function getPayment(){
            return $this->payment;
        }
        public function getSum_price(){
            return $this->sum_price;
        }
        public function getStatus(){
            return $this->status;
        }
        public function getDateCreated(){
            return $this->dateCreated;
        }

        //add order to database
        public function insertOrder($id_user,$id_room,$id_pj,$tgl,$month,$year,$duration,$payment,$sum_price,$status){
            $crud = new Crud();
            $result = $crud->execute("INSERT INTO order_room
                          (id_user,id_room,id_pj,date,month,year,duration,payment,sum_price,status)
                                 VALUES('$id_user','$id_room','$id_pj','$tgl','$month','$year','$duration','$payment','$sum_price','$status')");
            return $result;
        }

    }

?>