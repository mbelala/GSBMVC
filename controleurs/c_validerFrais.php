<?php
include("vues/v_sommaire_compt.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){
	
	
        case 'choisirVisiteur':{
               
         // Recupère la liste des visiteur ayant des fiches en etat CR
           
       $lesVisiteurs=$pdo->getLesVisiteurs(); 
         $lesCles = array_keys( $lesVisiteurs );
	 $visiteurASelectionner = $lesCles[0];
         
         
         include("vues/v_listeVisiteur.php"); 
         
         break ;
         
         
        }
        
        
        
        case 'selectionnerMois' : {
        
        $leVisiteur = $_REQUEST['lstVisiteurs'];     
	$lesMois=$pdo->getLesMoisDisponiblesCR($leVisiteur);
		// Afin de sélectionner par défaut le dernier mois dans la zone de liste
		// on demande toutes les clés, et on prend la première,
		// les mois étant triés décroissants
		$lesCles = array_keys( $lesMois );
                if ($lesCles!=null)
                {
		$moisASelectionner = $lesCles[0];
		include("vues/v_listeMois1.php");
                }
                            
                break;
          }
        
        
       case 'afficherFrais':{
                $idVisiteur = $_REQUEST['visiteur']; 
                $leMois = $_REQUEST['lstMois'];
                $visiteur=$pdo->getLeVisiteur($idVisiteur);
                $prenom=$visiteur['prenom'];
                $nom=$visiteur['nom'];
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
                $numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
                 include("vues/v_etatFrais2.php");
              include("vues/v_etatFraisHF.php");
		
                
                break ;
	} 
        
        
        case 'modifierFicheJust' : {
                $idVisiteur = $_REQUEST['idVisiteur']; 
                $leMois = $_REQUEST['mois']; 
                $just = $_REQUEST['just'];
                $pdo->majNbJustificatifs($idVisiteur, $leMois, $just);
                $visiteur=$pdo->getLeVisiteur($idVisiteur);
                $prenom=$visiteur['prenom'];
                $nom=$visiteur['nom'];
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
                 include("vues/v_etatFrais2.php");
              include("vues/v_etatFraisHF.php");
       
      
        break;
        
        }
        
        case 'modifierFiche':{
                $idVisiteur = $_REQUEST['idVisiteur']; 
                $mois = $_REQUEST['mois'];
		$lesFrais = $_REQUEST['lesFrais'];
                $etat = $_REQUEST['situ'];
		if(lesQteFraisValides($lesFrais)){
                    $pdo->majEtatFicheFrais($idVisiteur,$mois,$etat);
	  	 	$pdo->majFraisForfait($idVisiteur,$mois,$lesFrais);
		}
		else{
			ajouterErreur("Les valeurs des frais doivent être numériques");
			include("vues/v_erreurs.php");
		}
                $visiteur=$pdo->getLeVisiteur($idVisiteur);
                $prenom=$visiteur['prenom'];
                $nom=$visiteur['nom'];
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$mois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$mois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$mois);
		$numAnnee =substr( $mois,0,4);
		$numMois =substr( $mois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
                 include("vues/v_etatFrais2.php");
              include("vues/v_etatFraisHF.php");
		
	  break;
        }
         
        case 'actionFraisHF' : {
                $idficheHF = $_REQUEST['id']; 
                $choix = $_REQUEST['choix'];
                $pdo->choixValidationFraisHorsForfait($idficheHF,$choix);
                $idVisiteur = $_REQUEST['idVisiteur']; 
                $leMois = $_REQUEST['mois'];
                $visiteur=$pdo->getLeVisiteur($idVisiteur);
                $prenom=$visiteur['prenom'];
                $nom=$visiteur['nom'];
		$lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
		$lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
		$lesInfosFicheFrais = $pdo->getLesInfosFicheFrais($idVisiteur,$leMois);
		$numAnnee =substr( $leMois,0,4);
		$numMois =substr( $leMois,4,2);
		$libEtat = $lesInfosFicheFrais['libEtat'];
		$montantValide = $lesInfosFicheFrais['montantValide'];
		$nbJustificatifs = $lesInfosFicheFrais['nbJustificatifs'];
		$dateModif =  $lesInfosFicheFrais['dateModif'];
		$dateModif =  dateAnglaisVersFrancais($dateModif);
       
      include("vues/v_etatFrais2.php");
              include("vues/v_etatFraisHF.php");
              
        break;
        
        }
        
        
}
 
?>