<?php if(isset($_SESSION['korisnik'])): 
if($_SESSION['korisnik']->naziv === "admin"):?>
<div id="centar_reg">
  <div id="ddl_centar">
  <select name="lista" id="lista" onChange="prikaz()">
  <option value="0">Izaberite tabelu</option>
    <option value="1">korisnici</option>
    <option value="2">meni</option>
  </select></br>
    <div id="ispis_baza">
      <?php if(isset($_SESSION['izmena'])){

        echo $_SESSION['izmena'];
        unset($_SESSION['izmena']);
        }

        if(isset($_SESSION['izmena_greska'])){

        echo$_SESSION['izmena_greska'];
        unset($_SESSION['izmena_greska']);
        }

        if(isset($_SESSION['slika'])){

          echo $_SESSION['slika'];
          unset($_SESSION['slika']);
        }

        if(isset($_SESSION['slika_greska'])){
          echo $_SESSION['slika_greska'];
          unset($_SESSION['slika_greska']);
        }

        if(isset($_SESSION['izmena_slike'])){
          echo $_SESSION['izmena_slike'];
          unset($_SESSION['izmena_slike']);
        }
        if(isset($_SESSION['izmena_slike_greska'])){
          echo $_SESSION['izmena_slike_greska'];
          unset($_SESSION['izmena_slike_greska']);
        }
    ?>
    </div>
</div>
    <div id="tabela">
    </div>
      <div id="izmena_kor"> 
       <form action="php/ajax_update_user.php" method="POST" >
                 <input type="text" id="ime" name="ime" placeholder="Ime" />
                 <input type="text" id="prezime" name="prezime" placeholder="Prezime" />
                 <input type="text" id="adresa" name="adresa" placeholder="Adresa" />
                 <input type="text" id="email" name="email" placeholder="Email" />
                 <input type="text" id="tel" name="tel" placeholder="06" />

             <select id="opstina_adm" name="opstina">
             <option value="0">Izaberite Opstinu</option>
             <option value="1">Čukarica</option>
             <option value="2">Novi Beograd</option>
             <option value="3">Palilula</option>
             <option value="4">Rakovica</option>
             <option value="5">Savski venac</option>
             <option value="6">Stari grad</option>
             <option value="7">Voždovac</option>
             <option value="8">Vračar</option>
             <option value="9">Zemun</option>
             <option value="10">Zvezdara</option>
             <option value="11">Barajevo</option>
             <option value="12">Grocka</option>
             <option value="13">Lazarevac</option>
             <option value="14">Mladenovac</option>
             <option value="15">Obrenovac</option>
             <option value="16">Sopot</option>
             <option value="17">Surčin</option>
             </select></br>
             <select id="uloga" name="uloga">
             <option value="0">Izaberite Ulogu</option>
             <option value="1">Admin</option>
             <option value="2">Korisnik</option>
             </select></br>
             <input type="hidden" id="hiddenKorisnikID" name="hiddenKorisnikID"/>
             <b>Aktivan korisnik da/ne: </b>
             <input type="checkbox" name="aktivan" id="aktivan" value=1/>
             <input type="text" id="user_izmena" name="user_izmena" placeholder="Username" />
             <input type="password" id="lozinka" name="lozinka" placeholder="Lozinka" />
             <input type="submit"  name="reg" value="izmeni"/>
             </form> 
      </div> 
      <div id="izmena_meni">
      <form action="<?= $_SERVER['PHP_SELF'] ."?page=admin"?>" method="post" enctype="multipart/form-data">
          <input type="text" id="naziv_meni" name="naziv_meni"  placeholder="Naziv" value="<?php echo (isset($postToUpdate))? $postToUpdate->naziv : ''; ?>"/>
          <input type="text" id="cena" name="cena" placeholder="Cena" value="<?php echo (isset($postToUpdate))? $postToUpdate->cena : ''; ?>"/>
            <?php if(isset($postToUpdate)) : ?>

            <img src="<?= $postToUpdate->putanja ?>" />
        
            <?php endif; ?>
          <h4>Slika:</h4><input type="file" name="fSlika" /></br>
          <?php if(isset($postToUpdate)) : ?>

				  <input type="hidden" name="hdnIdSlika" value="<?= $postToUpdate->id ?>"/>
          <input type="hidden" name="hdnIdSlika_putanja" value="<?= $postToUpdate->id ?>"/>
			      <?php endif; ?>
          <input type="submit" name="<?php echo (isset($postToUpdate))? 'btnIzmenaMeni' : 'btnUnosMeni'; ?>" value="<?php echo (isset($postToUpdate))? 'Izmeni' : 'Unesi'; ?>"/>
      </form>
      </div>
</div>
    <?php else:?>
    <div id="centar_reg">
      <div id="zabrana_pristupa">
      <h1>NEMATE PRAVO PRISTUPA OVOJ STANICI</h1>
      </div>
    </div>
    <?php endif;?>

  <?php endif;?>
