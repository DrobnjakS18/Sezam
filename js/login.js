function logovanje(){

        var errors = [];
        var user = $("#username").val();
        var pass = $("#pass").val();

        var re_user = /^(?=.{8,50}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/;

        if(!re_user.test(user)){

            errors.push("Nije dobar username!Min 8 karaktera");
        }

        var re_pass = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

        if(!re_pass.test(pass)){

            errors.push("Nije dobra lozinka!Min 8 karaktera i barem 1 broj");
        }
        
        if(errors.length != 0){
            var prikaz = "<ul>";
            
            for(var i in errors){

                prikaz += "<li> " + errors[i] + " </li>";
            }

            prikaz +="</ul>";
            $("#ispis").html(prikaz);

            return false;
        }else {
          return true;
        }

}