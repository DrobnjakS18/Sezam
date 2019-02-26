<?php

if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Ne mozete pristupiti ovoj stranici!";
}

$podaci = null;
$status = 404;


if(isset($_POST['naziv_meni'])){

    header("content-type:application/json");
    include "konekcija.php";
    $naziv_meni = $_POST['naziv_meni'];

    if($naziv_meni == 2){

        $upit_meni = "SELECT * FROM slika";

        $upit = $konekcija->query($upit_meni);

        try{
        $rez = $upit->fetchAll();

        if($rez){

            $podaci = $rez;
            $status = 200;
            }
        else{
            $status = 400;
            }

        }catch(PDOException $e){
            $status =500;
            $e->getMessage();
        }

    }
}

http_response_code($status);
echo json_encode($podaci);