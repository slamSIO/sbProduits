<?php

	class ModeleSBProduits {

		private static $connexion = null ;
		
		private function __construct(){
			self::$connexion = new PDO( 'mysql:host=localhost;dbname=sbproduits', 'sanayabio', 'azerty' ) ;
		}

		private static function getConnexion(){
			if( self::$connexion == null ){
				new ModeleSBProduits() ;
			}
			return self::$connexion ;
		}

		public static function getClient( $email , $mdp ){
			
			$bd = self::getConnexion() ;
			
			$sql = "select id , nom , prenom from client where email = :email and mdp = :mdp" ;
			$st = $bd->prepare( $sql ) ;
			$st->execute( array( ':email' => $email , ':mdp' => $mdp ) ) ;
			$client = $st->fetch( PDO::FETCH_ASSOC ) ;
			$st->closeCursor() ;
			
			return $client ;
			
		}
		
		public static function getProduit( $idProduit ){
			
			$bd = self::getConnexion() ;
			
			$sql = "select id , libelle from produit where id = :idProduit" ;
			$st = $bd->prepare( $sql ) ;
			$st->execute( array( ':idProduit' => $idProduit ) ) ;
			$produit = $st->fetch( PDO::FETCH_ASSOC ) ;
			$st->closeCursor() ;
			
			return $produit ;
			
		}
		
		public static function getProduitsByLibelle( $libelle ){
			
			$bd = self::getConnexion() ;
			
			$sql = "select id , libelle from produit where libelle like :libelle" ;
			$st = $bd->prepare( $sql ) ;
			$st->execute( array( ':libelle' => '%' . strtolower( $libelle ) . '%' ) ) ;
			$produits = $st->fetchall( PDO::FETCH_ASSOC ) ;
			$st->closeCursor() ;
			
			return $produits ;
			
		}
		
		public static function getAvis( $idProduit ){
			
			$bd = self::getConnexion() ;
			
			$sql = "select client.id as id_client , nom , prenom , avis.id as id_avis , commentaire , horodatage "
				 . "from avis "
				 . "inner join client "
				 . "on client.id = avis.idClient "
				 . "where avis.idProduit = :idProduit " ;
				 
			$st = $bd->prepare( $sql ) ;
			$st->execute( array( ':idProduit' => $idProduit ) ) ;
			$avis = $st->fetchall( PDO::FETCH_ASSOC ) ;
			$st->closeCursor() ;
			
			return $avis ;
		
		}
		
		public static function enregistrerAvis( $commentaire , $idClient , $idProduit ){
			
			$bd = self::getConnexion() ;
			$sql = "insert into avis( commentaire , idClient , idProduit ) "
				 . "values( :commentaire , :idClient , :idProduit ) " ;
				 
			$st = $bd->prepare( $sql ) ;
			$st->execute(
					[
						':commentaire' => $commentaire ,
						':idClient' => $idClient ,
						':idProduit' => $idProduit
					]
				) ;
				
			if( $st -> rowCount() == 1 ){
				return TRUE ;
			}
			else {
				return FALSE ;
			}
		}

	} ;
	
	/*
	var_dump( ModeleSBProduits::getProduitsByLibelle( 'savon jasmin' ) ) ;
	
	var_dump( ModeleSBProduits::getProduitsByLibelle( 'SAVON jasmin' ) ) ;
	
	var_dump( ModeleSBProduits::getProduitsByLibelle( 'savon oranger' ) ) ;
	
	var_dump( ModeleSBProduits::getProduitsByLibelle( 'savon jasmin' ) ) ;
	
	var_dump( ModeleSBProduits::getProduitsByLibelle( 'jasmin' ) ) ;
	
	var_dump( ModeleSBProduits::getProduitsByLibelle( 'dentifrice' ) ) ;
	
	var_dump( ModeleSBProduits::getProduitsByLibelle( 'pomme' ) ) ;
	var_dump( ModeleSBProduits::getProduitsByLibelle( 'SAVON' ) ) ;
	var_dump( ModeleSBProduits::getProduitsByLibelle( 'ORANGER' ) ) ;
	
	
	var_dump( ModeleSBProduits::getProduit( 1 ) ) ;
	
	var_dump( ModeleSBProduits::getAvis( 1 ) ) ;
	var_dump( ModeleSBProduits::getAvis( 33 ) ) ;
	
	var_dump( ModeleSBProduits::enregistrerAvis( "Beurk" , 4 , 2 ) ) ;
	var_dump( ModeleSBProduits::getAvis( 2 ) ) ;
	*/
	


?>
