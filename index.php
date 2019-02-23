<?php 

    session_start();
    
    include "php/konekcija.php";
    include "php/insert_hrana.php";
    include "php/update_hrana.php";

    if(isset($_SESSION['korpa'])){
        echo "Tu je korpa";
}


    $page= "";

    if(isset($_GET['page'])){

        $page = $_GET['page'];
    }
    include "views/head.php";
    include "views/nav.php";


    switch($page){

        case "pocetna":
            include "views/pocetna.php";
            break;
        case "meni":
            include "views/meni.php";
            break;
        case "registracija":
            include "views/registracija.php";
            break;
        case "admin":
            if(isset($_GET['id'])){

                $id=$_GET['id'];
                $upit_hrana_izmena = "SELECT * FROM `slika` WHERE id= :id";

                $upit = $konekcija->prepare($upit_hrana_izmena);

                $upit->bindParam(":id",$id);

                try {
                    $upit->execute();
    
                    $rez = $upit->fetch();

                    if($rez){
                        $postToUpdate = $rez;
                    }
                }
                catch(PDOException $ex){
                    echo $ex->getMessage();
                }

                
            }

            include "views/admin.php";
            break;
        case "korpa":
            include "views/korpa.php";
            break;
        case "autor":
            include "views/autor.php";
            break;
        default:
            include "views/pocetna.php";
            break;
    }
    include "views/footer.php";
?>





