<?php


session_start();
include "konekcija.php";

$id=$_GET['id'];

$id_korisnik=$_SESSION['korisnik']->id;

try {


        $upit1="SELECT * FROM slika WHERE id=$id";
        $rez2= $konekcija->query($upit1)->fetch();

       

        $slika=$rez2->putanja_mala;
        $id_shopping=$_SESSION['korpa'];
        $naziv=$rez2->naziv;
        $cena=$rez2->cena;


        if($rez2){

            
            $upit2="INSERT INTO korisnik_korpa VALUES ('',:korpa_id,:slika,:naziv,:cena)";
            $stmt2=$konekcija->prepare($upit2);

            $stmt2->bindParam(":slika",$slika);
            $stmt2->bindParam(":korpa_id",$id_shopping);
            $stmt2->bindParam(":naziv",$naziv);
            $stmt2->bindParam(":cena",$cena);

            $rez3=$stmt2->execute();

            if($rez3){
                header("Location: ../index.php?page=korpa");
            }else{
                header("Location: ../index.php?page=meni");
            }
        }
    else {
        header("Location: ../index.php?page=meni");
    }
}
catch (PDOException $e){
    echo $e->getMessage();
}