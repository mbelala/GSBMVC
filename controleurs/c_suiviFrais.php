<?php
include("vues/v_sommaire_compt.php");
$action = $_REQUEST['action'];
$idVisiteur = $_SESSION['idVisiteur'];
switch($action){
	case 'afficherFiche':{
		  $fiches = $pdo->getFicheVAetRB();
                include("vues/v_suiviFrais.php");
		break;
	}
	 case 'modifierFiche':{
                $fiches = $pdo->getFicheVAetRB();
                foreach($fiches as $uneFiche)
                {
                    if(isset($_POST[$uneFiche['idFiche']]) && $_POST[$uneFiche['idFiche']]=="true")
                    {
                        $uneFiche["idEtat"] = "RB";
                        $pdo->modifierFiche($uneFiche['idVisiteur'],$uneFiche['mois']);
                    }
                }
                include("vues/v_suiviFrais.php");
                break;  
        }
}
?>