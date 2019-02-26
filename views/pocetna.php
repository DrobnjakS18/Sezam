<!--============ Slider ============-->


<div class="sliderwrapper">
      <div id="slider" class="container">
           <div class="slider">
      			<ul class="slides">
    		 	 	  <li class="slide">
                        <h5 class="wow fadeInDown" data-wow-delay="0.8s">Posna pizza </h5>
                      	<p class="wow fadeInUp" data-wow-delay="0.8s">Novo u ponudi! Uslisena je zelja mnogih kupaca, od sada u ponudi i posna pizza. Spremljena po profesionalnoj recepturi sa sastojcima visokog kvaliteta. Posna pizza po promorivnoj ceni od samo 790 din.</p>
                         <img src="images/posna.png" width="317" height="256" class="wow fadeInRight" 
                      data-wow-delay="0.8s" alt="slide1img"> 
                      <!-- <img src="images/slideimg.png" width="317" height="256" class="wow fadeInRight" 
                      data-wow-delay="0.8s" alt="slideimg2">  -->
                      </li>
                      <li class="slide">
                       <h5 class="wow fadeInDown" data-wow-delay="0.8s">Becki burger</h5>
                      	<p class="wow fadeInUp" data-wow-delay="0.8s">Svetsko, a nase! Becki burger domace kuhinje. Uzivajte u ovom neprevazidjenom burgeru po ceni od 300 din.</p>
                         <img src="images/beckiburger.png" width="317" height="256" class="wow fadeInRight" 
                      data-wow-delay="0.8s" alt="slide1img"> 
                      <!-- <img src="images/slideimg.png" width="317" height="256" class="wow fadeInRight" 
                      data-wow-delay="0.8s" alt="slideimg2">  -->
                      </li>
                      <li class="slide">
                        <h5 class="wow fadeInDown" data-wow-delay="0.8s">Double cheeseburger</h5>
                      	<p class="wow fadeInUp" data-wow-delay="0.8s">Gladni ste? Nedovoljno veliki obrok? Pripremili smo za vas specijalni double cheeseburger koji vas nece ostaviti ravnodusnim. Samo ovog meseca po promo ceni od 280 din.</p>
                         <img src="images/doublecheeseburger.png" width="317" height="256" class="wow fadeInRight" 
                      data-wow-delay="0.8s" alt="slide1img"> 
                      <!-- <img src="images/slideimg.png" width="317" height="256" class="wow fadeInRight" 
                      data-wow-delay="0.8s" alt="slideimg2">  -->
                      </li>
        		  </ul>
            </div>
      </div> <!-- End of Slider-->
</div> <!-- end of sliderwrapper-->



<!--============ Best Dishes ============-->



<div class="bestdisheswrapper">
    <div id="bestdishes" class="container">
       
		 <h2 class="wow fadeInUp" data-wow-delay="0.3s">IZDVAJAMO</h2>
      <div class="slider">
      		    <ul class="slides">
          	 	 <li class="slide">
                    <div class="item">
                          <img src="images/thumb1.png" width="226" height="225" alt="pasta" class="wow flipInX"
                           data-wow-delay=".8s"> 
                          <h3>Pasta Capellini</h3>
                      </div> <!-- end of item-->
                      
                   <div class="item2">
                          <img src="images/pizza1.png" width="226" height="225" alt="pizza" class="wow flipInX"
                           data-wow-delay=".8s"> 
                          <h3>Pizza Capricciosa</h3>
                      </div> <!-- end of item-->
                      
                   <div class="item3">
                          <img src="images/burger1.png" width="226" height="225" alt="burger" class="wow flipInX"
                           data-wow-delay=".8s"> 
                          <h3>Becki burger</h3>
                      </div> <!-- end of item-->
                  </li>
                   <li class="slide">
                    <div class="item">
                          <img src="images/thumb2.jpg" width="226" height="225" alt="pasta" > 
                          <h3>Pasta Bucatini</h3>
                      </div> <!-- end of item-->
                      
                   <div class="item2">
                          <img src="images/pizza2.png" width="226" height="225" alt="pizza"> 
                          <h3>Pizza Tuna</h3>
                      </div> <!-- end of item-->
                      
                   <div class="item3">
                          <img src="images/burger2.png" width="226" height="225" alt="burger"> 
                          <h3>cheeseburger veliki</h3>
                      </div> <!-- end of item-->
                  </li>
                  <li class="slide">
                    <div class="item">
                          <img src="images/thumb3.png" width="226" height="225" alt="pasta" > 
                          <h3>Pasta bolognese</h3>
                      </div> <!-- end of item-->
                      
                   <div class="item2">
                          <img src="images/pizza3.png" width="226" height="225" alt="pizza"> 
                          <h3>Pizza Mexico</h3>
                      </div> <!-- end of item-->
                      
                   <div class="item3">
                          <img src="images/burger3.png" width="226" height="225" alt="burger"> 
                          <h3>dupli cheeseburger </h3>
                      </div> <!-- end of item-->
                  </li>
                   
        </ul>
      </div> <!-- end of slider-->
    </div> <!-- end of besth dishes-->
</div> <!-- end of bestdishes wrapper-->

<!--============ LOGOVANJE ============-->
<?php if(!isset($_SESSION['korisnik'])): ?>
<!--============ ISPISATI PODATKE O ULOGOVANOM KORISNIKU ============-->
<div class="bookonlinewrapper">
    <div class="container" id="bookonline">
    <div id="ispis"></div>
    <h3 class="wow fadeInUp" data-wow-delay="0.3s"> ULOGUJ SE</h3>
    <form  action="php/login.php" method="POST" onSubmit="return logovanje()" >
    <input type="text" id="username" name="username" class="name wow zoomIn" placeholder="Username" >
    <input type="password" id="pass" name="pass" class="name wow zoomIn" placeholder="Lozinka">
    <input type="submit" id="login" name="login" class="booknow wow fadeInUp" value="ENTER"/>  
    </form>

    </div>
</div> <!-- end of book online wrapper-->
<?php else:?>
<div class="bookonlinewrapper">
    <div class="container" id="bookonline">
        <h3 class="wow fadeInUp" data-wow-delay="0.3s">PODACI O KORISNIKU</h3>
        <div id="podaci_korisnik">
          <h4 class="wow fadeInUp" data-wow-delay="0.3s">Ime:<?= $_SESSION['korisnik']->ime?></h4>
          <h4 class="wow fadeInUp" data-wow-delay="0.3s">Prezime:<?= $_SESSION['korisnik']->prezime?></h4>
          <h4 class="wow fadeInUp" data-wow-delay="0.3s">Korisnicko ime:<?= $_SESSION['korisnik']->korisnicko_ime?></h4>
          <h4 class="wow fadeInUp" data-wow-delay="0.3s">Telefon:<?= $_SESSION['korisnik']->telefon?></h4>
          <h4 class="wow fadeInUp" data-wow-delay="0.3s">Datum registacije:<?= $_SESSION['korisnik']->datum_registracije?></h4>
        </div>
    </div>
</div>
<?php endif;?>
