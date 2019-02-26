<?php
session_start();
if(isset($_GET['id'])){

    $id_brisanje_hrane = $_GET['id'];


    $upit_brisanje_hrane = "DELETE FROM `slika` WHERE id = :id";

    include "konekcija.php";
    $upit_delete = $konekcija->prepare($upit_brisanje_hrane);
    $upit_delete->bindParam(':id',$id_brisanje_hrane);


        $rez_brisanje_hrane = $upit_delete->execute();

    try{
        if($rez_brisanje_hrane){

           
            $_SESSION['slika'] = "Uspesno obrisana slika";
            header("location: ../index.php?page=admin");
        }
        else {
            $_SESSION['slika_greska'] = "Slika nije obrisana";
            header("location: ../index.php?page=admin");
        }
    }catch(PDOExceptin $e){

        $e->getMessage();
    }
    

}