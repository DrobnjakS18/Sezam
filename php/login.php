<?php 
if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Ne mozete pristupiti ovoj stranici!";
}
    if(isset($_POST['login'])){
        session_start();

        $kor_ime = $_POST['username'];
        $loznika = $_POST['pass'];
        $errors = [];

        $re_user = "/^(?=.{8,50}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/";
        if(!preg_match($re_user,$kor_ime)){

            $errors[] = "Nije dobar username!Min 8 karaktera";
        }

        $re_pass = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
        if(!preg_match($re_pass,$loznika)){

            $errors[] = "Nije dobra lozinka!Min 8 karaktera i barem 1 broj";
        }

        

        if(count($errors) != 0){
            $_SESSION['greske']= "Pogresno uneti podaci";
            header("location: ../index.php?page=pocetna");
        }
        else {

            include "konekcija.php";
            $loznika = md5($loznika);
    
            $upit_login = "SELECT * FROM korisnik k INNER JOIN uloga u on k.uloga_id = u.uloga_id WHERE korisnicko_ime = :user AND lozinka = :pass AND aktivan = 1";

            $upit = $konekcija->prepare($upit_login);

            $upit->bindParam(':user',$kor_ime);
            $upit->bindParam(':pass',$loznika);

            $upit->execute();
            $result = $upit->fetch();
           try{
            if($result){

                $_SESSION['korisnik'] = $result;

                $id_korisnik=$_SESSION['korisnik']->id;

                $upit = "INSERT INTO korpa VALUES('',:id_korisnik)";
                $stmt = $konekcija->prepare($upit);
                $stmt->bindParam(":id_korisnik", $id_korisnik);
                $rez = $stmt->execute();
    
                $korpa_id=$konekcija->lastInsertId();
                $_SESSION['korpa']=$korpa_id;

                header("location: ../index.php");
            }else {

                $_SESSION['greske'] = "Nije pronadjen takav korisnik u bazi";
                header("location: ../index.php");
            }
                }
            catch(PDOExcpetion $e){
                $_SESSION['greske'] = "Serverska greska ".$e;
                $e->getMessage();
            }

        }

    }