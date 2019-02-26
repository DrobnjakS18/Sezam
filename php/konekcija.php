<?php
//TREBA ZASTITI STRANICU
        $host="";
        $dbname = "";
        $user = "";
        $pass = "";
        
        $konekcija = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$user,$pass);
        
        try{
        
            $konekcija = new PDO("mysql:host=$host;dbname=$dbname",$user,$pass);
            $konekcija->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $konekcija->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        }
        catch(PDOException $e){
        
            echo $e->getMessage();
        }
        


