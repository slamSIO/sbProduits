<?php


	$libelleProduit = $_POST[ "libelle" ] ;
	
	require "modeles/ModeleSBProduits.php" ;
	$produits = ModeleSBProduits::getProduitsByLibelle( $libelleProduit ) ;
	
	require "vues/vue-produits-recherches.php" ;

?>
