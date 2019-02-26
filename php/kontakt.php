<?php

if($_SERVER['REQUEST_METHOD'] != "POST"){
    echo "Ne mozete pristupiti ovoj stranici!";
}
    $status = 404;
    $data = null;
    if(isset($_POST['poruka'])){

        $nizGresaka = [];
        $ime_prezime = $_POST['ime_prezime'];
        $email = $_POST['email'];
        $tekst = $_POST['tekst'];

        $ime_prezime_reg = "/^([A-ZČĆŠĐŽ][a-zčćšđž]{2,9})(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,14})+$/";

        if(!preg_match($ime_prezime_reg,$ime_prezime)){

            $nizGresaka[] = "Ime i prezime nije u dobrom formatu";
        }

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

            $nizGresaka[] = "Email nije u dobrom formatu!";
            
        }

        $tekst_reg = "/^[\w\s]{1,255}$/";

        if(!preg_match($tekst_reg,$tekst)){

            $nizGresaka[] = "Poruka nije u dobrom formatu!";
        }

        if(count($nizGresaka) > 0){

            $data = "Lose popunjeni podaci u formi";
            $status=422;
        }
        else{

           
            $admin_email = "drobnjak.stefan18@gmail.com";
            $headers = array(
                'From' => $email,
                'Reply-To' => 'drobnjak.stefan18@gmail.com',
                'X-Mailer' => 'PHP/' . phpversion()
            );
            $poslato = mail($admin_email,$ime_prezime,$tekst,$headers);

            if($poslato){

                echo "Poslto";
            }
            else {

                echo "Nije Poslato";
            }
        }
    }