<?php

if(isset($_POST['btnUnosMeni'])){

    $naziv_meni = $_POST['naziv_meni'];
    $cena = $_POST['cena'];
    $alt_slike = $_POST['naziv_meni'];

    $slika = $_FILES['fSlika'];

    var_dump($slika);

    $ime_slike = $slika["name"];
    $tip_slike = $slika['type'];
    $vel_slike = $slika['size'];
    $tmp_putanja = $slika['tmp_name'];

    $greske_slika = [];

    $reNaziv = "/^[\w\s]{1,255}$/";

    if(!preg_match($reNaziv,$naziv_meni)){

        $greske_slika[] = "Nije dobar naziv slike";

    }

    $reCena = "/^[\d]{1,4}$/";

    if(!preg_match($reCena,$cena)){

        $greske_slika[] = "Nije dobra cena.Izmedju 1 i 10000 dinara";
    }

    $dozvoljeni_formati = array("image/jpg", "image/jpeg", "image/png", "image/gif");

    if(!in_array($tip_slike, $dozvoljeni_formati)){
		$greske_slika[] = "Tip slike nije ok.";
	}

	if($vel_slike > 3000000){ // 3.000.000B ~ 3MB
		$greske_slika[] = "Fajl mora biti manji od 3MB.";
    }
    
    if(count($greske_slika) > 0){

        $_SESSION['greske_slika'] = "Lose popunjena polja";
    }
    else {

        $naziv_slike = time().$ime_slike;
        $nova_putanja = "slike_meni_unos/".$naziv_slike;
        

        if(move_uploaded_file($tmp_putanja,$nova_putanja)){

            $putanja_mala = "slike_meni_unos/mala_".$naziv_slike;
            include "funckije.php";
            malaSlika($nova_putanja,$putanja_mala,100,100);

            $upit_slika_unos = "INSERT INTO `slika`(`id`, `naziv`, `cena`, `putanja`, `putanja_mala`, `alt`) VALUES ('',:naziv,:cena,:nova_putanja,:putanja_mala,:alt_slike)";

            include "konekcija.php";
            $upit= $konekcija->prepare($upit_slika_unos);

            $upit->bindParam(":naziv",$naziv_meni);
            $upit->bindParam(":cena",$cena);
            $upit->bindParam(":nova_putanja",$nova_putanja);
            $upit->bindParam(":putanja_mala",$putanja_mala);
            $upit->bindParam(":alt_slike",$naziv_meni);

            try{
                 $rez_slika_unos =$upit->execute();

                 if($rez_slika_unos){
                     echo "Uspesno ste upisali proizvod u bazu";
                 }
            }catch(PDOException $e){

                echo $e->getMessage();
            }
        }
        else {

            echo "Nije uspeo upload fajla";
        }
    }

}