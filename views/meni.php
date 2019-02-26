<div id="centar">
        <div class="sliderwrapper">
            <div class="container">
                <div id="centar_meni">   
                    <div id="mp_proizvodi">
                        <?php 
                            $upit = "SELECT * FROM slika";
                            $upit_meni = $konekcija->query($upit);
                            $rez = $upit_meni->fetchAll();
                            foreach($rez as $red):
                        ?>
                        <div class="proizvod">
                            <div class="proizvod_slika">
                                    <img src="<?=$red->putanja ?>" alt="<?= $red->alt ?>" idth="300px" height="300px"/>
                                    <h3><?= $red->naziv ?></h3>
                                </div>
                                <div class="proizvod_cena">
                                        <p><span><?= $red->cena ?></span> din.</p>
                                        <?php if (isset($_SESSION['korisnik'])):?>
                                        <a href="php/korpa.php?id=<?=$red->id?>" name="cart">DODAJ U KORPU</a>
                                        <?php endif;?>
                                </div>
                            
                        </div>
                            <?php endforeach;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
