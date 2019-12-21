<?php
    class DbOperation{

        private $con;
        function _constructor(){
            require_once dirname(_FILE_).'/DbConnect.php';
            $db=new DbConnect();
            $this->con=$db->connect();
        }
    function createUser($username,$pass,$email){
        $password=md5($pass);
        $query="INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES (null, ?, ?, ?);";
        $stmt=$this->con->prepare($query);
        $stmt->bind_param("sss",$username,$password,$email);
        if($stmt->execute()){
            return true;
        }
        else 
        return false;
    }

    }