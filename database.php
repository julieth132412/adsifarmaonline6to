<?php
  class Database{
    public function getConnection(){
        $localhost='bsei26xjivpbkksbgjsi-mysql.services.clever-cloud.com';
                $database='bsei26xjivpbkksbgjsi';
                $user='uwmpvcc6cxce6qjj';
                $password='uFsDoBxd0XDuN2fElCQ5';
                $link = new PDO("mysql:host=$localhost;dbname=$database",$user,$password);
                return $link;
    }
    }
?>
