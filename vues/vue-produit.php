<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">
		<title>SB - Produits</title>
	</head>
	
	<body>
		<a href="/clients/espace">Mon espace</a>
		<a href="/produits/recherche">Produits</a>
		<a href="/clients/deconnecter">Se déconnecter</a>
		
		<h4>Produit : <?= $produit[ 'libelle' ] ?></h4>
		
		<h4>Avis</h4>
		
		<div>
			
			<?php foreach( $avis as $unAvis ){ ?>
				
				<div>
					
					<hr />
					
					<div>
						Par <?= $unAvis[ 'nom' ] ?> <?= $unAvis[ 'prenom' ] ?> le <?= $unAvis[ 'horodatage' ] ?> : 
					</div>
					<p>
						<?= $unAvis[ 'commentaire' ] ?>
					</p>
					
				</div>
					
			<?php } ?>
			
		</div>
		
		<hr />
		
		<h3>Nouvel avis :</h3>
		
		<form action="/produits/<?= $produit[ 'id' ] ?>/avis/enregistrer" method="POST">
			
			<label for="commentaire">Commentaire :</label>
			</br>
			<textarea id="commentaire" name="commentaire" rows="10" cols="40" >
			</textarea>
			
			<br/>
			
			<input type="submit" value="Enregistrer" />
		
		</form>
		
	</body>
	
</html>
