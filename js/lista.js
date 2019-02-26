function prikaz(){

    var selektovan = document.querySelector("#lista").value;


    
    if(selektovan == 2){

        $.ajax({

            url:"php/admin_meni.php",
            method:"post",
            dataType:"json",
            data: {
    
                naziv_meni:selektovan,
            },
            success:function(podaci){
                
                var lista_meni = "<table style='width:100%'><tr><th>ID</th><th>Naziv</th><th>Cena</th><th>Slika</th><th colspan='2'>Podesavanja </th>";
                for(var i in podaci){
                    lista_meni +="<tr>"
                    lista_meni +="<td>"+podaci[i].id+"</td>"
                    lista_meni +="<td>"+podaci[i].naziv+"</td>"
                    lista_meni +="<td>"+podaci[i].cena+"</td>"
                    lista_meni +="<td><img src="+podaci[i].putanja_mala+" alt="+podaci[i].alt+"</td>"
                    lista_meni +="<td><a href='index.php?page=admin&id="+podaci[i].id+"'>Izmeni</a></td>"
                    lista_meni +="<td><a class='delete-user' href='php/delete_hrana.php?id="+podaci[i].id+"'>Obrisi</a></td>"
                    lista_meni +="</tr>"
                }
                lista_meni += "</table>";
    
                $("#tabela").html(lista_meni);
            },
            error:function(xhr,statusTxt,error){

                var status = xhr.status;

                switch(status){

                    case 404:
                        alert("Ne mozete pristupiti ovoj stranici!");
                        break;
                    case 400:
                        alert("Los zahtev");
                        break;
                    case 500: 
                        alert("Serverska greska");
                        break;
                    default:
                        alert("Greska kod"+ status + " - " + statusTxt);
                }
            }
        });
    }


    if(selektovan == 1){
        $.ajax({

            url:"php/admin.php",
            method:"post",
            dataType:"json",
            data: {
    
                naziv:selektovan
            },
            success:function(podaci){
    
                var lista_meni = "<table style='width:100%'><tr><th>ID</th><th>Ime</th><th>Prezime</th><th>Uloga</th><th>Email</th><th>Datum Registracije</th><th colspan='2'>Podesavanja </th>";
                for(var i in podaci){
                    lista_meni +="<tr>"
                    lista_meni +="<td>"+podaci[i].id+"</td>"
                    lista_meni +="<td>"+podaci[i].ime+"</td>"
                    lista_meni +="<td>"+podaci[i].prezime+"</td>"
                    lista_meni +="<td>"+podaci[i].naziv+"</td>"
                    lista_meni +="<td>"+podaci[i].email+"</td>"
                    lista_meni +="<td>"+podaci[i].datum_registracije+"</td>"
                    lista_meni +="<td><a class='update-user' href='#' data-id='"+podaci[i].id+"'>Izmeni</a></td>"
                    lista_meni +="<td><a class='delete-user' href='#' data-id='"+podaci[i].id+"'>Obrisi</a></td>"
                    lista_meni +="</tr>"
                }
                lista_meni += "</table>";
    
                $("#tabela").html(lista_meni);
            },
            error:function(xhr,statusTxt,error){
                var status = xhr.status;
    
                switch(status){
    
                    case 404:
                        alert("Nije pronadjena stranica");
                        break;
                    case 500:
                        alert("Serverska greska");
                        break;
                    default:
                        alert("Greska error: " + status + " - " + statusTxt);
                        break;
                }
            }
        });
    }
   
}