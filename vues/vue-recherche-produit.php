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
		
		<form action="/produits/rechercher" method="POST">
			
			<label for="libelle">Libellé du produit recherché :</label>
			<input type="text" id="libelle" name="libelle" >
		
			<br/>
		
			<input type="submit" value="Rechercher" />
		
		</form>

		
	</body>
	
</html>
