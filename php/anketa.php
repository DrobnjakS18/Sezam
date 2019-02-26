<?php
    if($_SERVER['REQUEST_METHOD'] != "POST"){
        echo "Ne mozete pristupiti ovoj stranici!";
    }

    if(isset($_POST['btnAnketa'])){
        session_start();
        $id = $_POST['anketa'];

        
        $upit_rez = "UPDATE `anketa_rezultat` SET `rezultat`= rezultat+1 WHERE rez_id =".$id;
        include "konekcija.php";
        $upit = $konekcija->prepare($upit_rez);
        $upit->bindParam(':id',$id);

        try{

            $rez = $upit->execute();

            if($rez){

                $upit_sve = "SELECT * FROM anketa_rezultat ar INNER JOIN anketa a ON ar.anketa_id=a.anketa_id";

                $upit = $konekcija->query($upit_sve);

                $rez_sve = $upit->fetchAll();

                if($rez_sve){
                    $_SESSION['anketa'] = $rez_sve;
                    header("location: ../index.php?page=autor");
                }
                else {

                    $_SESSION['anketa_greska'] = "Greska prilikom glasanja";
                    header("location: ../index.php?page=autor");
                }
            }
            else {

                $_SESSION['anketa_greska'] = "Greska prilikom glasanja";
                header("location: ../index.php?page=autor");
            }
        }catch(PDOExceptin $e){
            $_SESSION['anketa_greska'] = "Serverska greska" .$e;
            header("location: ../index.php?page=autor");
            echo $e->getMessage();
        }

    }
    