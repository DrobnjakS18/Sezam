<div id="centar">
        <div id="content" class="float_r">
        	<h1>Korpa</h1>
        	<table width="680px" cellspacing="0" cellpadding="5">
                   	  <tr style="background:#ff5a0b" >
                        	<th width="220" align="left">Slika </th> 
                        	<th width="180" align="left">Naziv </th> 

                        	<th width="60" align="right">Cena </th> 

                        	
                            
                      </tr>
                <?php

                    $id=$_SESSION['korpa'];
                    $upiit="SELECT * FROM korisnik_korpa WHERE korpa_id=:id";

                    $stmt=$konekcija->prepare($upiit);
                    $stmt->bindParam(":id",$id);
                    $stmt->execute();
                    $rez=$stmt->fetchAll();

                    foreach ($rez as $red):
                ?>
                    	<tr>
                        	<td><img src=<?= $red->slika?> alt="image 1" /></td>
                        	<td><?= $red->naziv?></td>

                            <td align="right"><?= $red->cena?> </td>

                            <td align="center"> <a href="php/korpa_delete.php?id=<?=$red->kk_id?>"><img src="../images/remove_x.gif" alt="remove"/><br />Remove</a> </td>
						</tr>
                <?php endforeach;?>

                        <tr>

                            <td colspan="3" align="right" height="30px" style="background:#ff5a0b; font-weight:bold; text-align:right; color:white;"> 
                            <?php 
                            $upitCena="SELECT SUM(cena) as cena from korisnik_korpa WHERE korpa_id=$id GROUP BY korpa_id" ;
                            $upit = $konekcija->query($upitCena);
                            $rezultat = $upit->fetchAll();
                            foreach($rezultat as $item ):
                                ?>
                                 Ukupno:<?= $item->cena?> rsd
                               </td>
                            <?php endforeach;?>
                            <!-- <td  align="right" height="30px" style="background:#ff5a0b; font-weight:bold"> </td> -->

						</tr>
					</table>

            </div>
            
        <div class="cleaner"></div>
</div>