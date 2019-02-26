<?php

    $id = $_GET['id'];

    $upit_cart_del = "DELETE FROM `korisnik_korpa` WHERE kk_id=:id";

    include "konekcija.php";
    $upit = $konekcija->prepare($upit_cart_del);

    $upit->bindParam(":id",$id);

    try{

        $rez = $upit->execute();

        if($rez){

            header("location: ../index.php?page=korpa");
        }
        else {

            header("location: ../index.php?page=korpa");
        }
    }catch(PDOException $e){
        header("location: ../index.php?page=korpa");
        $e->getMessage();
    }





    
    