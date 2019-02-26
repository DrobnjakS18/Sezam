<?php 

if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Ne mozete pristupiti ovoj stranici!";
}

    if(isset($_POST['reg'])){

     

        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $opstina = $_POST['opstina'];
        $kor_ime = $_POST['user'];
        $lozinka = $_POST['lozinka'];
        $adresa = $_POST['adresa'];




        $errors = [];

        $ime_reg = "/^([A-ZČĆŠĐŽ][a-zčćšđž]{2,9}(\s)*){1,2}$/";

        if(!preg_match($ime_reg,$ime)){

            $errors[] = "Ime nije u dobrom formatu!";

        }
        
        $prezime_reg = "/^([A-ZČĆŠĐŽ][a-zčćšđž]{2,14}(\s)*){1,2}$/";

        if(!preg_match($ime_reg,$ime)){

            $errors[] = "Ime nije u dobrom formatu!";
            
        }

        $adresa_reg = "/^([A-Za-zšđćč]{4,50})(\s([A-Z0-9a-zšđćč]{0,50}))*$/";

        if(!preg_match($adresa_reg,$adresa)){
    
            $errors[] = "Adresa nije u dobrom formatu!";
        }


        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

            $errors[] = "Email nije u dobrom formatu!";
            
        }

        $tel_reg = "/^06[01234569][0-9]{6,7}$/";

        if(!preg_match($tel_reg,$tel)){

            $errors[] = "broj telefona nije u dobrom formatu!";
            
        }

        if($opstina == 0 ){

            $errors[] = "Niste izabrali opstinu";
            
        }

        $re_user = "/^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/";

        if(!preg_match($re_user,$kor_ime)){

            $errors[] = "Nije dobar username!Min 8 karaktera";
        }

        $re_pass = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";


        if(!preg_match($re_pass,$lozinka)){

            $errors[] = "Nije dobra lozinka!Min 8 karaktera i barem 1 broj";
        }

        if(count($errors) != 0){

            // echo "<ul>";
            // foreach($errors as $red){
            //         echo "<li>$red</li>";
            // }
            // echo "</ul>";
            $_SESSION['reg_greske'] = $errors;
            header("location: ../index.php?page=registracija");
        }
        else {
            
            include "konekcija.php";
            $lozinka = md5($lozinka);
            $upit = "INSERT INTO korisnik VALUES(,:ime,:prezime,:kor_ime,:email,:adresa,:tel,:lozinka,:time,1,2,:opstina)";
            $upit_unos = $konekcija->prepare($upit);

            $upit_unos->bindParam(":ime",$ime);
            $upit_unos->bindParam(":prezime",$prezime);
            $upit_unos->bindParam(":kor_ime",$kor_ime);
            $upit_unos->bindParam(":email",$email);
            $upit_unos->bindParam(":adresa",$adresa);
            $upit_unos->bindParam(":tel",$tel);
            $upit_unos->bindParam(":lozinka",$lozinka);

            $datum = date("Y-m-d H:i:s",time());

            $upit_unos->bindParam(":time",$datum);
            $upit_unos->bindParam(":opstina",$opstina);

            try{
                $rez = $upit_unos->execute();

                if($rez){
                       
                    header("location: ../index.php?page=pocetna");
                }
                else {
                    $_SESSION['reg_greske'] = "Nije uspela registracija";
                    header("location: ../index.php?page=registracija");
                }
            }catch(PDOException $e){

                $_SESSION['reg_greske'] = "Serverska greska".$e->getMessage();
                header("location: ../index.php?page=registracija");
            }
        }
  
    }