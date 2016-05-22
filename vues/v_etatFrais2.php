<div id="contenu">
    
    <form action='index.php?uc=validerFrais&action=modifierFiche&idVisiteur=<?php echo $idVisiteur ?>&mois=<?php echo $leMois ?>' method='POST'>
<h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> de <?php echo $nom." ".$prenom?>  : 
    </h3>
    <div class="encadre">
    <p>
        Etat : <?php echo $libEtat?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide?>
              
                     
    </p>
  	<table class="listeLegere">
  	   <caption>Eléments forfaitisés </caption>
           
          
           
        <tr >
         <?php
         foreach ( $lesFraisForfait as $unFraisForfait ) 
		 {
			$libelle = $unFraisForfait['libelle'];
		?>	
			<th> <?php echo $libelle?></th>
		 <?php
        }
		?>
                        <th>Situation:</th>
		</tr>
        <tr>
        <?php
          foreach (  $lesFraisForfait as $unFraisForfait  ) 
		  {
				$quantite = $unFraisForfait['quantite'];
                                $id = $unFraisForfait['idFraisForfait'];
		?>
                <td class="qteForfait">
                    <input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="10" maxlength="5" value="<?php echo $quantite?>" >
					 </td>
                
                        
                
		 <?php
                    }
                  ?>  
                <td width="80"> 
					<select size="3" name="situ">
						<option value="CL">Enregistré</option>
						<option value="VA">Validé</option>
						<option value="RB">Remboursé</option>
					</select></td>
                  
       
		</tr>
                
                
                
    </table>
    
    
  	
   
<center> 
    
        </br><input  type="submit" name="valider" value="Valider"/>
            <input  name="annuler" type="reset" value="Effacer"/>
            
</center>
            </form>
</div>
  


  













