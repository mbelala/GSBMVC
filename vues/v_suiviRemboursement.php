<html>
<head>
	
	<style type="text/css">
		<!-- body {background-color: white; color:5599EE; } 
			.titre { width : 180 ;  clear:left; float:left; } 
			.zone { float : left; color:7091BB } -->
	</style>
</head>
<body>
    
		<p class="titre" />
		<div style="clear:left;"><h2>Frais au forfait </h2></div>
		<table style="color:black;" border="1">
			<tr><th>Repas midi</th><th>Nuitée </th><th>Etape</th><th>Km </th><th>Situation</th><th>Date opération</th><th>Remboursement</th></tr>
			  
        <tr>
        <?php
          foreach (  $lesFraisForfait as $unFraisForfait  ) 
		  {
				$quantite = $unFraisForfait['quantite'];
		?>
                <td width="80" class="qteForfait"><?php echo $quantite?> </td>
		 <?php
          }
		?>
	
                                        
				<td width="80"> <?php echo $libEtat?></td>	
				<td width="80"> <?php echo $dateModif?></td>	
				<td width="80"> <?php echo $montantValide?></td>						
			</tr>
		</table>
		
		<p class="titre" /><div style="clear:left;"><h2>Hors Forfait</h2></div>
		<table style="color:black;" border="1">
			<tr><th>Date</th><th>Libellé </th><th>Montant</th></tr>
			<tr align="center">
                            
                            <?php      
          foreach ( $lesFraisHorsForfait as $unFraisHorsForfait ) 
		  {
			$date = $unFraisHorsForfait['date'];
			$libelle = $unFraisHorsForfait['libelle'];
			$montant = $unFraisHorsForfait['montant'];
                       
		?>
             <tr>
                <td width="100" ><?php echo $date ?></td>
                <td width="220"><?php echo $libelle ?></td>
                <td width="90"><?php echo $montant ?></td>
              	
             </tr>
        <?php 
          }
		?>
		</table>
               <p class="titre" />
		<div style="clear:left;"><h2>Frais Hors classification </h2></div>
		<table style="color:black;" border="1">
                    <tr><td>
		
		<div class="titre">Nb Justificatifs</div>
	</td><td width="80"> <?php echo $nbJustificatifs ?> </td></tr>
                </table>
                </form>
	
</div>
</body>
</html>

