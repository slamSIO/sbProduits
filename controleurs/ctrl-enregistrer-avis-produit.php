<?php

	require "modeles/ModeleSBProduits.php" ;
	ModeleSBProduits::enregistrerAvis( $_POST[ 'commentaire' ] , $_SESSION[ 'id' ] , $idProduit ) ;
	
	header( "Location: /produits/$idProduit" ) ;

?>
