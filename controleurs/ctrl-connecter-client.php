<?php

	$email = $_POST[ "email" ] ;
	$mdp = $_POST[ "mdp" ] ;
	
	require "modeles/ModeleSBProduits.php" ;
	$client = ModeleSBProduits::getClient( $email , $mdp ) ;
	
	if( $client !== FALSE ){
		session_start() ;
		
		$_SESSION[ "id" ] = $client[ "id" ] ;
		$_SESSION[ "nom" ] = $client[ "nom" ] ; 
		$_SESSION[ "prenom" ] = $client[ "prenom" ] ; 
		
		header( "Location: /clients/espace" );
	}
	else {
		$erreur = 'EMail ou mot de passe incorrect.' ;
		require "vues/vue-connexion.php" ;
	}

?>
