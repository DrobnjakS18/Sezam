<!--============ FOOTER ============-->

<div class="clearfix"></div>
<div class="footerwrapper">
    <footer class="container">
    	<div class="customerreview">
       		 <h2>Lokacija</h2>
          <div class="review">
        	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1415.066765855616!2d20.45439719355193!3d44.818844220731584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a654cea4b708b%3A0xe4421907de7b22b1!2sKneza+Mihaila+44%2C+Beograd+11000!5e0!3m2!1sen!2srs!4v1528039730701" width="366px" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        	</div> <!-- end of review-->
             
              
              
            
            
        </div>
        <div class="socialize">
        
      <h2>Mreze</h2>
        <div class="socialimgs">
          <a href="https://www.facebook.com"><img src="images/fb.png" width="68" height="68" class="facebook"
           alt="fb"></a>
        <a href="https://twitter.com"><img src="images/twitter.png" width="68" height="68" class="twitter"
        alt="twitter"></a>
        <a href="https://www.youtube.com"><img src="images/youtube.png" width="68" height="69" class="youtube" alt="youtube"></a>
        <a href="https://plus.google.com/discover"><img src="images/g+.png" width="68" height="68" class="google" alt="g+"></a>
      </div> <!--end of social imgs-->
      
       </div>
      
      
<div class="sendfeedback">
<div id="kontakt_greske"></div>        
  	  <h2>Kontakt</h2>
            <form>
            <h6>Ime i Prezime:</h6>
            <input type="text" class="yourname" id="kontakt_imePrezime" name="kontakt_imePrezime"/>
             <h6>Email:</h6>
            <input type="text" class="email_kontakt" id="kontakt_email" name="kontakt_email"/>
             <h6>Poruka:</h6>
            <textarea id="kontakt_tekst" name="kontakt_tekst"></textarea>
            
            <button type='button' id="kontakt_posalji" name="kontakt_posalji">Posalji </button>
            
            
            
            </form>
        </div> <!-- end of feedback-->
        
    
    
    
    </footer> <!-- end of footer-->

    <script src="js/jquery.js"></script> 
	<script src="js/jquery.glide.js"></script>
    <script type="text/javascript" src="js/MyJQ.js"></script>
    <script type="text/javascript" src="js/login.js"></script>
    <script type="text/javascript" src="js/provera_reg.js"></script>
    <script type="text/javascript" src="js/lista.js"></script>
    <!-- <script type="text/javascript" src="js/phpmailer.js"></script> -->
    <!-- <script type="text/javascript" src="js/korpa.js"></script> -->
    <script src="js/jquery.localScroll.min.js" type="text/javascript"></script>
	<script src="js/jquery.scrollTo.min.js" type="text/javascript"></script> 
    <script src="js/wow.min.js" type="text/javascript"></script> 

<!-- scroll function -->
<script type="text/javascript">
$(document).ready(function() {
   $('#navigations').localScroll({duration:800});
});
</script>


<script src="js/wow.min.js"></script>
<script>
new WOW().init();
</script>



</div> <!-- end of footer-->




<!--============ COPYRIGHTS ============-->


<div class="copyrightswrapper">
    <div id="copyrights" class="container">
    
 	   <p>Copyright 2018 <a href="https://www.facebook.com/stefan.drobnjak1"> Stefan Drobnjak</a> All Rights Reserved</p>
    
    </div> <!-- end of copyrights-->
</div> <!-- end of website-->
	






</div>

<script type="text/javascript">
    $('.sliderwrapper .slider').glide({
		autoplay: 7000,
		animationDuration: 3000,
		arrows: true,
		
		
	
		});
	
</script>
	
    <script type="text/javascript">
    $('.bestdisheswrapper .slider').glide({
		autoplay: false,
		animationDuration: 700,
		arrows: true,
		navigation:false,
		
		
	
		});
	
	
</script>

<script type="text/javascript">
$(document).ready(function() {
    $(".delete-user").click(function(){

        alert("asdfsdfasdf");
    });
});
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tabela").on("click",".delete-user",function(){

            var id = $(this).data("id");
            
            $.ajax({

                url:"php/ajax_delete_user.php",
                method:"post",
                dataType:"json",
                data: {

                    id:id
                },
                success:function(podaci,status, jqXHR){

                    console.log(jqXHR.status);

                    if(status == 201 || status == 200){

                        alert("Korisnik uspesno obrisan");
                    }
                },
                error:function(xhr,statusTxt,error){

                    var status = xhr.status;

                    if(status == 404){

                        alert("Doslo je do greske");
                    }
                }
            });
            });

        $("#tabela").on("click",".update-user",function(){

            var id = $(this).data("id");

            $.ajax({

                url:"php/ajax_select.php",
                method:"post",
                dataType:"text",
                data:{

                    id:id

                },
                success:function(podaci){


                    var data = JSON.parse(podaci);
                    
                    $("#ime").val(data.ime);
                    $("#prezime").val(data.prezime);
                    $("#adresa").val(data.adresa);
                    $("#email").val(data.email);
                    $("#tel").val(data.telefon);
                    $("#opstina_adm").val(data.opstina_id);
                    $("#uloga").val(data.uloga_id);
                    $("input[name='aktivan']").removeAttr('checked');
						if(data.aktivan==1){
							$(`input[name='aktivan']`).prop('checked',true);
							$(`input[name='aktivan']`).val(data.aktivan);
						} 
                    $("#user_izmena").val(data.korisnicko_ime);
                    $("#hiddenKorisnikID").val(data.id);
                },
                error:function(xhr,statusTxt,error){

                    var status = xhr.status;

                    switch(status){

                        case 404:
                            alert("Nije pronadjeno nista u bazi");
                            break;
                        case 500:
                            alert("Serverska greska");
                            break;
                        default:
                            alert("Greska je sa statusnim kodom: " + status + " - " + statusTxt);
                            break;
                    }
                }
            });
        });

        $("#kontakt_posalji").click(function(){

            var nizGresaka = [];
            var ime_prezime = $("#kontakt_imePrezime").val();
            var email = $("#kontakt_email").val();
            var tekst = $("#kontakt_tekst").val();

            var ime_prezime_reg = /^([A-ZČĆŠĐŽ][a-zčćšđž]{2,9})(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,14})+$/;

            if(!ime_prezime_reg.test(ime_prezime)){

                nizGresaka.push("Ime i Prezime nije u dobrom formatu");
            }

            var email_kontakt_reg = /^[a-zA-Z0-9-_.]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/;

            if(!email_kontakt_reg.test(email)){

                nizGresaka.push("Email nije u dobrom formatu");
            }

            var tekst_reg = /^[\w\s]{1,255}$/;

            if(!tekst_reg.test(tekst)){

                nizGresaka.push("Poruka nije u dobrom formatu");
            }

            if(nizGresaka.length != 0){

                var greske = "<ul>";
                for(var i in nizGresaka){

                    greske+="<li>"+nizGresaka[i]+"</li>";
                }
                greske+="</ul>";

                $("#kontakt_greske").html(greske);
                return false;
            }
            else {

                $.ajax({
                    url:"php/kontakt.php",
                    method:"post",
                    dataType:"json",
                    data:{

                        poruka:"Poslato",
                        ime_prezime:ime_prezime,
                        email:email,
                        tekst:tekst
                    },
                    success:function(podaci){

                    },
                    error:function(xhr,statusTxt,error){


                    }
                    
                });
                return true;
            }

        });

       
     
    });



</script>
</body>

</html>