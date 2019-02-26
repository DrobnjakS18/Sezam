<?php
    
    if(isset($_POST['btnIzmenaMeni'])){

        $id = $_POST['hdnIdSlika'];
        $naziv = $_POST['naziv_meni'];
        $cena = $_POST['cena'];
        $slika = $_FILES['fSlika'];
        $alt_slike = $_POST['naziv_meni'];

        $greske = [];
        $ime_slike = $slika["name"];
        $tip_slike = $slika['type'];
        $vel_slike = $slika['size'];
        $tmp_putanja = $slika['tmp_name'];
        
        
    $reNaziv = "/^[\w\s]{1,255}$/";

    if(!preg_match($reNaziv,$naziv)){

        $greske[] = "Nije dobar naziv slike";
    }

    $reCena = "/^[\d]{1,4}$/";

    if(!preg_match($reCena,$cena)){

        $greske[] = "Nije dobra cena.Izmedju 1 i 10000 dinara";
    }

    $dozvoljeni_formati = array("image/jpg", "image/jpeg", "image/png", "image/gif");

    if(!in_array($tip_slike, $dozvoljeni_formati)){
		$greske[] = "Tip slike nije ok.";
	}

    if($vel_slike > 3000000){ // 3.000.000B ~ 3MB
		$greske[] = "Fajl mora biti manji od 3MB.";
    }
    if(count($greske) > 0){
		// echo "<ol>";
		
		// foreach($greske as $error){
		// 	echo "<li> $error </li>";
		// }
        // echo "</ol>";
        $_SESSION['izmena_slike_greska']= "Losi podaci za slanje";
	}
    else {

        $naziv_slike = time().$ime_slike;
        $nova_putanja = "slike_meni_unos/".$naziv_slike;

        

        if(move_uploaded_file($tmp_putanja,$nova_putanja)){


            $putanja_mala = "slike_meni_unos/mala_".$naziv_slike;

            include "funckije.php";
            malaSlika($nova_putanja,$putanja_mala,100,100);

                $upit_update ="UPDATE `slika` SET `naziv`=:naziv,`cena`=:cena,`putanja`=:putanja,`putanja_mala`=:putanja_mala,`alt`=:alt_slike WHERE id = :id";
                
                include "konekcija.php";
                $upit = $konekcija->prepare($upit_update);

                $upit->bindParam(':naziv',$naziv);
                $upit->bindParam(':cena',$cena);
                $upit->bindParam(':putanja',$nova_putanja);
                $upit->bindParam(':putanja_mala',$putanja_mala);
                $upit->bindParam(':alt_slike',$alt_slike);
                $upit->bindParam(':id',$id);

                $rez = $upit->execute();

                if($rez){
                    $_SESSION['izmena_slike'] = "Uspesno izmenjena podaci u bazi";
                
                }
                else {
                    $_SESSION['izmena_slike_greska']= "Neuspesno izmenjeni podaci u bazi";
                    
                }
        }else {
            $_SESSION['izmena_slike_greska']= "Slika nije uspesno uploudovana";
            
        }

    }


    }


