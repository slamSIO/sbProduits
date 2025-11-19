<?php
	//var_dump( $_GET[ 'route' ] ) ;
	//$route = $_GET[ 'route' ] ;
	
	$route = parse_url( $_SERVER[ 'REQUEST_URI' ] , PHP_URL_PATH ) ;

	if( $route == '/' ){
		require "vues/vue-accueil.php" ;
	}
	elseif( $route == '/clients/connexion' ){
		require "vues/vue-connexion.php" ;
	}
	elseif( $route == '/clients/connecter' ){
		require "controleurs/ctrl-connecter-client.php" ;
	}
	elseif( $route == '/clients/espace' ){ 
		session_start() ;
		require "vues/vue-espace-client.php" ;
	}
	elseif( $route == '/clients/deconnecter' ){
		session_start() ;
		require "controleurs/ctrl-deconnecter-client.php" ;
	}
	elseif( $route == '/produits/recherche' ){
		session_start() ;
		require "vues/vue-recherche-produit.php" ;
	}
	elseif( $route == '/produits/rechercher' ){
		session_start() ;
		require "controleurs/ctrl-rechercher-produit.php" ;
	}
	elseif( preg_match( '#^/produits/([0-9]+)$#' , $route , $atomes ) ){
		session_start() ;
		$idProduit= $atomes[ 1 ] ;
		require "controleurs/ctrl-consulter-produit.php" ;
	}
	elseif( preg_match( '#^/produits/([0-9]+)/avis/enregistrer$#' , $route , $atomes ) ){
		session_start() ;
		$idProduit= $atomes[ 1 ] ;
		require "controleurs/ctrl-enregistrer-avis-produit.php" ;
	}
	else {
		var_dump( $route ) ;
	}
?>
