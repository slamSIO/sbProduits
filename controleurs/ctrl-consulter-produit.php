<?php
	
	require "modeles/ModeleSBProduits.php" ;
	
	$produit = ModeleSBProduits::getProduit( $idProduit ) ;
	$avis = ModeleSBProduits::getAvis( $idProduit ) ;
	
	require "vues/vue-produit.php" ;
?>
