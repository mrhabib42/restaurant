<?php

    class App{

        public $host = HOST;
        public $dbname = DBNAME;
        public $user = USER;
        public $password = PASS;

        public $link;

        // Create a constructor

        public function __construct() {

            $this->connect();

        }

        public function connect(){
            $this->link = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname."", $this->user , $this->password);
         }


        // Select all data from database according to condition
        public function selectAll($querrry){

            $rows = $this->link->query($querrry);
            $rows->execute();

            $allRows = $rows->fetchAll(PDO::FETCH_OBJ);

            if($allRows){
                return $allRows;
            }
            else{
                return false;
                echo "kuch nahi hai";
            }
        }


        //select single data from the database according to condition
        public function selectOne($querrry){

            $row = $this->link->query($querrry);
            $row->execute();

            $oneRow = $row->fetch(PDO::FETCH_OBJ);

            if($oneRow){
                return $oneRow;
            }
            else{
                return false;
                echo "kuch nahi hai";
            }
        }

        //validate data before processing
        public function validate($arr){

           if(in_array("",$arr)){
            echo "empty";
           }
        }


        //Insert data into database

        public function insert($querrry , $arr , $path){
            if($this->validate($arr) == "empty"){
                echo "<script>alert ('one or more fields are empty ')</script>";
            }

            else{

                $insert_record = $this->link->prepare($querrry);
                $insert_record->execute($arr);

                header("location: ".$path."");
                
            }

             
        }


        //Update data into database
        public function update($querrry , $arr , $path){
            if($this->validate($arr) == "empty"){
                echo "<script>alert ('one or more fields are required')</script>";
            }
            else{

                $update_record = $this->link->prepare($querrry);
                $update_record->execute($arr);

                header("location:".$path."");
            }
        }

        //Delete data from the database
        public function delete($querrry , $path){
            $delete_record = $this->link->query($querrry);
            $delete_record->execute();

            header("location:".$path."");
        }

        //Registration Method
        public function register($querrry , $arr , $path){
            if($this->validate($arr) == "empty"){
                echo "<script>alert ('one or more fields required')</script>";
            }
            else{
                $register_user = $this->link->prepare($querrry);
                $register_user->execute($arr);

                header("location:".$path."");
            }

        }

        //Login Method

        public function login($querrry , $data , $path){

            //validate th email adress
            $login_user = $this->link->query($querrry);
            $login_user->execute();

            $fetch = $login_user->fetch(PDO::FETCH_ASSOC);

            if($login_user->rowCount() > 0){
              
                //now check for password
                if(password_verify($data['password'], $fetch['password'] )){

                    // start session variables now
                    $_SESSION['email']= $fetch['email'];
                    $_SESSION['username']= $fetch['username'];
                    $_SESSION['id']= $fetch['id'];

                




                   // header("location:".APPURL."");
                    header("location:".$path."");

                }else{
                    echo "<script>alert ('incorrect password')</script>";
                }


            }else{
                echo "<script>alert ('incorrect username')</script>";
            }


        }

        //starting sessions

        public function startingSession(){
            session_start();
        }

        //validating sessions
        //remenber you have to change tha path here accordingly in parameter
        public function validatingSession(){
            if(isset($_SESSION['id'])){

                header("location:".APPURL."");
            }

        }

        public function validatingSessionAdmin(){
            if(isset($_SESSION['email'])){

                header("location:".ADMINURL."");
            }

        }

        public function validatingSessionAdminInside(){
            if(!isset($_SESSION['email'])){

                header("location:".ADMINURL."/admins/login-admins.php");
            }

        }

        public function validatingSessionNot(){
            if(!isset($_SESSION['id'])){

                echo "<script>alert('Please Login for Table Bookings')</script>";
                echo "<script>window.location.href='".APPURL."'</script>";
                //header("location:".APPURL."");
            }

        }

        public function validateCart($q){
            $row = $this->link->query($q);
            $row->execute();
            $count = $row->rowCount();
            return $count;
            
        }


    }
?>

    