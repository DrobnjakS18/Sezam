function registracija_kor(){

    
    var errors = [];


    var first_name = $("#ime").val();
    var first_name_reg = /([A-ZČĆŠĐŽ][a-zčćšđž]{2,9}(\s)*){1,2}$/;

    if(!first_name_reg.test(first_name)){

        errors.push("Ime nije u dobrom formatu!");
    }

    var last_name = $("#prezime").val();
    var last_name_reg = /^([A-ZČĆŠĐŽ][a-zčćšđž]{2,14}(\s)*){1,2}$/;

    if(!last_name_reg.test(last_name)){

        errors.push("Prezime nije u dobrom formatu!");
    }

    var adresa = $("#adresa").val();
    var adresa_reg = /^([A-Za-zšđćč]{4,50})(\s([A-Z0-9a-zšđćč]{0,50}))*$/;

    if(!adresa_reg.test(adresa)){

        errors.push("Adresa nije u dobrom formatu!");
    }

    var email = $("#email").val();
    var email_reg = /^[a-zA-Z0-9-_.]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/;

    if(!email_reg.test(email)){

        errors.push("Email nije u dobrom formatu!");
    }


    var tel = $("#tel").val();
    var tel_reg = /^06[01234569][0-9]{6,7}$/;

    if(!tel_reg.test(tel)){
        errors.push("Broj telefona nije u dobrom formatu!");
    }

    var opstina = document.querySelector("#opstina");
    var opstina_cekirana = opstina.options[opstina.selectedIndex].value;
    
    if(opstina_cekirana == 0){

        alert("Niste odabrali opstinu");
    }

    var user = $("#user").val();
    var re_user = /^(?=.{8,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/;

    if(!re_user.test(user)){

        errors.push("Username nije u dobrom formatu!");
    }

    var pass = $("#lozinka").val()
    var re_pass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

        if(!re_pass.test(pass)){

            errors.push("Lozinka nije u dobrom formatu!");
        }

    if(errors.length != 0){

        var prikaz = "<ul>";      
        for(var i in errors){

            prikaz += "<li> " + errors[i] + " </li>";
        }

        prikaz +="</ul>";
        // $("#reg_ispis").html(prikaz);
        // document.querySelector("#reg_ispis").innerHTML= prikaz;
        return false;
    }
    else{
        alert("Uspesno ste se registrovali!")
        return true;
    }
}