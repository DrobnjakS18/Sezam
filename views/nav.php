<!--============ Navigation ============-->

<div class="headerwrapper">
	<div id="header" class="container">
		<div class="logo"> <a href="index.php?page=pocetna"><img src="images/sezamLogo.png" alt="logo" width="165" height="100"></a> </div> 
        <nav>
            <ul id="navigations">
                <?php 
                    $upit = "SELECT * FROM navigacija";
                    $upit_nav = $konekcija->query($upit);
                    $rez_nav = $upit_nav->fetchAll();
                    foreach($rez_nav as $red):
                ?>
                <li><a href="<?= $red->putanja?>"><?= $red->naslov ?></a></li>
                    <?php endforeach;?>
            </ul>
            <div id="nalog">
                 <?php if($_SESSION['korisnik']->naziv === "admin"): ?>
                    <ul>
                            <li><a href="index.php?page=admin">ADMIN</a></li>
                    </ul>
                <?php endif;?>
                <?php if(isset($_SESSION['korisnik'])):?>
                <ul>
                <li>
                <a href="index.php?page=korpa"><i  class="fas fa-shopping-cart"></i></a> 
                </li>
                <!-- <li><a href="index.php?page=nalog">MOJ NALOG</a></li> -->
                <li><a href="php/logout.php">ODJAVA</a></li>
                </ul>  
                    <?php endif;?>
            </div>
        </nav>
      </div> <!--end of header-->
</div> <!-- end of headerwrapper-->

