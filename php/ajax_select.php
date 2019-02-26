<?php

if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Ne mozete pristupiti ovoj stranici!";
}
    if(isset($_POST['id'])){
        header("content-type:application/json");
        $id = $_POST['id'];
        $upit_sel = "SELECT * FROM korisnik k INNER JOIN uloga u on k.uloga_id = u.uloga_id WHERE k.id = :id";
        include "konekcija.php";
        $upit = $konekcija->prepare($upit_sel);
        $upit->bindParam(':id',$id);

        try{

            $upit->execute();
            
            $rez = $upit->fetch();

            if($rez){

                $podaci = $rez;
                $status = 200;
            }
            else {

                $status = 404;
            }
        }catch(PDOException $e){
            $status = 500;
            echo $e->getMessage();
        }
    }
http_response_code($status);
echo json_encode($podaci);
