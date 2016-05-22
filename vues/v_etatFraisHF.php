
    
<table class="listeLegere">
            <caption>  Descriptif des éléments hors forfait</caption>
             <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class='montant'>Montant</th>  
                  <th class='montant'>Statut</th> 
                <th class="Situation">Action</th>
             </tr>
        <?php      
          foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) 
		  {
			$date = $unFraisHorsForfait['date'];
			$libelle = $unFraisHorsForfait['libelle'];
			$montant = $unFraisHorsForfait['montant'];
                        $id = $unFraisHorsForfait['id'];
                         $stat = $unFraisHorsForfait['validation'];
                        
		?>
             <tr>
                <td><?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
                <?php
                if($stat==1){?>
                <td>Validé</td>
                <?php } else if($stat==0){
                ?>
                <td>Refusé</td> <?php }
                ?>
                 <td width="80"> 
					
						<a href='index.php?uc=validerFrais&action=actionFraisHF&id=<?php echo $id ?>&choix="1"&idVisiteur=<?php echo $idVisiteur ?>&mois=<?php echo $leMois ?>'>valider</a>
						<a href='index.php?uc=validerFrais&action=actionFraisHF&id=<?php echo $id ?>&choix="0"&idVisiteur=<?php echo $idVisiteur ?>&mois=<?php echo $leMois ?>'>refuser</a>
					</td>
                 </tr>
        <?php 
          }
		?>
    </table>
 <form action='index.php?uc=validerFrais&action=modifierFicheJust&idVisiteur=<?php echo $idVisiteur ?>&mois=<?php echo $leMois ?>"' method='POST'>
    
    <caption> Nombres de justificatifs:<input type="text" value="<?php echo $nbJustificatifs ?>" id="just" name="just"> 
       </caption>
   
<center> 
    
    
    
  
        </br><input  type="submit" name="valider" value="Valider"/>
            <input  name="annuler" type="reset" value="Effacer"/>
            
</center>
            </form>
            
            </div>
 </div>