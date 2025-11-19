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
		
		<h4>Produits recherchés</h4>
		
		<div>Votre recherche : <?= $libelleProduit ?></div>
		
		<table>
			<thead>
				<tr>
					<th>Code</th>
					<th>Libellé</th>
					<th></th>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach( $produits as $unProduit ){ ?>
				
					<tr>
						<td><?= $unProduit[ 'id' ] ?></td>
						<td><?= $unProduit[ 'libelle' ] ?></td>
						<td><a href="/produits/<?= $unProduit[ 'id' ] ?>">Consulter</a></td>
					</tr>
				
				<?php } ?>
			</tbody>
			
		</table>
		
	</body>
	
</html>
