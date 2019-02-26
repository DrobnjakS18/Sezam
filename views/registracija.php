<div class="sliderwrapper">
    <div class="container">
            <div id="centar_reg">
                <div class="bookonlinewrapper1">
                <h2 class="wow fadeInUp" data-wow-delay="0.3s">REGISTRACIJA</h2>
                </div>
                <form action="php/registracija.php" method="post">
                    <input type="text" id="ime" name="ime" placeholder="Ime" class="registracija_name wow zoomIn"/>
                    <input type="text" id="prezime" name="prezime" placeholder="Prezime" class="registracija_name wow zoomIn"/>
                    <input type="text" id="adresa" name="adresa" placeholder="Adresa" class="registracija_name wow zoomIn"/>
                    <input type="text" id="email" name="email" placeholder="Email" class="registracija_name wow zoomIn"/>
                    <input type="text" id="tel" name="tel" placeholder="06" class="registracija_name wow zoomIn"/>

                    <select id="opstina" name="opstina" class=" wow zoomIn">
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
                    <input type="text" id="user" name="user" placeholder="Username" class="registracija_name wow zoomIn"/>
                    <input type="password" id="lozinka" name="lozinka" placeholder="Lozinka" class="registracija_name wow zoomIn"/>
                    <input type="submit" id="registracija" name="reg" value="Posalji" class="registracija_name wow zoomIn" onclick="return registracija_kor()"/>
                </form>
            </div>
            <?php if(isset($_SESSION['reg_greske'])){

                var_dump($_SESSION['reg_greske']);
                unset($_SESSION['reg_greske']);
            }?>
        <div id="reg_ispis"></div>
</div>