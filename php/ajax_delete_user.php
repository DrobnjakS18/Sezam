<?php 
    if($_SERVER['REQUEST_METHOD'] != "POST"){
        echo "Ne mozete pristupiti ovoj stranici!";
    }

    if(isset($_POST['id'])){

        $id = $_POST['id'];

        $upit_del = "DELETE FROM `korisnik` WHERE id = :id";

        include "konekcija.php";
        $upit = $konekcija->prepare($upit_del);

        $upit->bindParam(":id",$id);

        $rez = $upit->execute();

        if($rez){
            var_dump($rez);
            $status = 200;
        }
        else {

            $status = 404;
        }
    }

    http_response_code($status);