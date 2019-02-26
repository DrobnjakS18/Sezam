<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] != "POST"){
        echo "Ne mozete pristupiti ovoj stranici!";
    }
    if(isset($_POST['reg'])){
        session_start();

        $id=$_POST['hiddenKorisnikID'];
        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $opstina = $_POST['opstina'];
        $user_izmena = $_POST['user_izmena'];
        $lozinka = $_POST['lozinka'];
        $adresa = $_POST['adresa'];
        $aktivan = $_POST['aktivan'];
        $uloga =$_POST['uloga'];

        $lozinka = md5($lozinka);
        $upit_update = "UPDATE `korisnik` 
        SET`ime`=:ime,`prezime`=:prezime,`korisnicko_ime`=:kor_ime,`email`=:email,`adresa`=:adresa,`telefon`=:tel,`lozinka`=:lozinka,`datum_registracije`=:datum,`aktivan`=:aktivan,`uloga_id`=:uloga,`opstina_id`=:opstina WHERE id = :id";

        include "konekcija.php";
        $upit = $konekcija->prepare($upit_update);

        $datum = date("Y-m-d H:i:s",time());


        $upit->bindParam(':ime',$ime);
        $upit->bindParam(':prezime',$prezime);
        $upit->bindParam(':kor_ime',$user_izmena);
        $upit->bindParam(':email',$email);
        $upit->bindParam(':adresa',$adresa);
        $upit->bindParam(':tel',$tel);
        $upit->bindParam(':lozinka',$lozinka);
        $upit->bindParam(':datum',$datum);
        $upit->bindParam(':aktivan',$aktivan);
        $upit->bindParam(':uloga',$uloga);
        $upit->bindParam(':opstina',$opstina);
        $upit->bindParam(':id',$id);

        try{

            $rez =$upit->execute();

            if($rez){
                $_SESSION['izmena'] = "Korisnik uspesno promenjen";
               header("location:../index.php?page=admin");
            }
            else {
                $_SESSION['izmena_greska'] = "Korisnik nije izmenjen";
                header("location:../index.php?page=admin");
            }
            
        }catch(PDOException $e){
            $e->getMessage();
        }
    }