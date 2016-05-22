<?php
if(!isset($_REQUEST['action'])){
	$_REQUEST['action'] = 'demandeConnexion';
}
$action = $_REQUEST['action'];
switch($action){
	case 'demandeConnexion':{
		include("vues/v_connexion.php");
		break;
	}
	case 'valideConnexion':{
		$login = $_REQUEST['login'];
		$mdp = $_REQUEST['mdp'];
		$visiteur = $pdo->getInfosVisiteur($login,$mdp);
		if(!is_array( $visiteur)){
			ajouterErreur("Login ou mot de passe incorrect");
			include("vues/v_erreurs.php");
			include("vues/v_connexion.php");
		}
                
                //associe un sommaire different si le visiteur est comptable ou non 
		else{
			$id = $visiteur['id'];
			$nom =  $visiteur['nom'];
			$prenom = $visiteur['prenom'];
                        $compt = $visiteur['compt'];
			connecter($id,$nom,$prenom);
                        if($compt==1){
                            include("vues/v_sommaire_compt.php");
                        }
                        else{
			include("vues/v_sommaire.php");
                        }
                        }
		break;
	}
	default :{
		include("vues/v_connexion.php");
		break;
	}
}
?>