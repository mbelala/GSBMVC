<?php
include("vues/v_sommaire_compt.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){

    
    case 'genererPdf':{
    $infoscompt=$pdo->getLeVisiteur($idVisiteur);
     $nomcompt=$infoscompt['nom'];
     $prenomcompt=$infoscompt['prenom'];
    $id=$_REQUEST['id'];
    $mois=$_REQUEST['mois'];
    $visiteur=$pdo->getLeVisiteur($id);
    $lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($id,$mois);
    $fraisForfait=$pdo->getLesFraisForfait($id,$mois);
    $fraisHorsForfait=$pdo->getLesFraisHorsForfait($id,$mois);
    $montantValide = $lesInfosFicheFrais['montantValide'];
    $nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
    $date = $lesInfosFicheFrais['dateModif'];
    $numAnnee =substr( $mois,0,4);
    $numMois =substr( $mois,4,2);
    
    
    include ("vues/v_pdfCreation.php");
            
            	break;
	}
	
}
?>