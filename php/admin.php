<?php 

if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Ne mozete pristupiti ovoj stranici!";
}

$podaci = null;
$status = 404;

if(isset($_POST['naziv'])){

    header("content-type:application/json");
    include "konekcija.php";
    $naziv = $_POST['naziv'];
    
    if($naziv == 1){

        $upit_kor = "SELECT *FROM korisnik k INNER JOIN uloga u on k.uloga_id = u.uloga_id";

        $upit = $konekcija->query($upit_kor);
        try{

            $rez_kor = $upit->fetchAll();

            if($rez_kor){

                $podaci = $rez_kor;
                $status= 200;
            }
            else {
                $status = 404;
            }
        }
        catch(PDOException $e){
            $status = 500;
            echo $e->getMessage();
        }
    }

}
http_response_code($status);
echo json_encode($podaci);
