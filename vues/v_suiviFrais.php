<div id="contenu"> 
<h2>Historique des fiches de frais</h2></br>
 
    <div id='contenu table'>
        <form action='index.php?uc=suiviFrais&action=modifierFiche' method='POST'>
<?php
 echo "<table border='1'>";
        echo"<th id>Nom</th>";
        echo"<th id>Prénom</th>";
        echo "<th>Nb Justificatifs</th> </th>";
        echo "<th>Montant Valide</th>";
        echo "<th>Date Modif</th>";
        echo "<th>Etat</th>";
        echo "<th>Rembousée</th>";
        echo "<th>PDF </th>";

foreach($fiches as $uneFiche)
{
        
        $idV = $uneFiche['idVisiteur'] ;
        $visiteur = $pdo->getLeVisiteur($idV);
        $mois = $uneFiche['mois'];
        $nbJustificatifs = $uneFiche['nbJustificatifs'] ;
        $montantValide = $uneFiche['montantValide'] ;
        $dateModif = $uneFiche['dateModif'] ;
        $idEtat = $uneFiche['idEtat'] ;
        
        echo "<tr>";
        echo "<td align='center'>".$visiteur['nom']."</td>";
        echo "<td align='center'>".$visiteur['prenom']."</td>";
        echo "<td align='center'>".$nbJustificatifs."</td>";
        echo "<td align='center'>".$montantValide."€</td>";
        echo "<td align='center'>".$dateModif."</td>";
        echo "<td align='center'>".$idEtat."</td>";
        if ($uneFiche['idEtat'] == 'VA'){ echo "<td align='center'><input name=".$uneFiche['idFiche']." type='radio' value='true'/></td>"; }
        else{
            echo "<td align='center'> </td>";
        }
        echo "<td align='center'><a href='index.php?uc=pdf&action=genererPdf&id=".$idV."&mois=".$mois."'><img src='images/pdf.png' style='margin-left:15px'/></a></td>";
        echo "</tr>";
}
 echo"</table>";
?>
            </br><input  type="submit" name="valider" value="Valider"/>
            <input  name="annuler" type="reset" value="Effacer"/>
            </form>
    </div>
</div>