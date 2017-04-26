<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>exo scrud1</title>
		<style>
			h1{ color:red;}
			h3{ color:orange;}
			body{ background-color: #F5F5F5;}
		</style>
</head>
<body>

	<h2>connected</h2>
	<?php
		echo '<h1>Bonjour à tous</h1>';
	
		echo '<h1>Connect</h1>';
	?>
	<?php
	try{
$bdd = new PDO('mysql:host=localhost;dbname=colyseum','root','root');
}catch(PDOException $e){
	print"error ".$e->getMessage()."<br/>";
	die();
}
?>

<?php  
 	echo '<h3>Exercice 1 : Afficher tous les clients.</h3>';

	foreach ($bdd-> query('select * from clients') as $row ){
			echo $row['lastName']." ".$row['firstName']."<br/>";
		}	
?>
<?php
	echo '<h3>Exercice 2 : Afficher tous les types de spectacles possibles.</h3>';

	foreach ($bdd -> query('select * from showTypes') as $row ) {
			echo utf8_encode( $row['type']).'<br/>';
	}
?>
<?php
	echo '<h3>Exercice 3 : Afficher les 20 premiers clients.</h3>';

	foreach ($bdd -> query('select * from clients limit 20') as $row) {
			echo $row['lastName']." ".$row['firstName']."<br/>";
	}
?>
<?php
	echo '<h3>Exercice 4 : N\'afficher que les clients possédant une carte de fidélité.</h3>';
		/*  foreach ($dbh->query("SELECT*FROM clients JOIN cards ON clients.cardNumber=cards.cardNumber WHERE cardTypesId=1 ")as $row){ 
		        echo $row["lastName"]." ".$row["firstName"]." ".$row["id"]."</br>";     } */


				foreach ($bdd -> query('select * from clients') as $row) {
			echo $row['lastName']." ".$row['firstName']."<br/>";
	}
?>
<?php
	echo '<h3>Exercice 5 : Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".<br/>
Les afficher comme ceci : *Nom du client*<br/>
Prénom : *Prénom du client*<br/>
Trier les noms par ordre alphabétique.</h3>';
	
			foreach ($bdd -> query('SELECT * from clients where lastName like "M%"') as $row) {
				echo $row['lastName']." ".$row['firstName']."<br/>";
			}
?>
<?php
	
	echo '<h3>Exercice 6 : Afficher le titre de tous les spectacles ainsi que l\'artiste, la date et l\'heure.<br/> Trier les titres par ordre alphabétique. <br/>Afficher les résultat comme ceci : *Spectacle* par *artiste*, le *date* à *heure*.';
?>
<?php
	echo '<h3>Exercice 7 : Afficher tous les clients comme ceci :
Nom : *Nom de famille du client*<br/>
Prénom : *Prénom du client*<br/>
Date de naissance : *Date de naissance du client*<br/>
Carte de fidélité : *Oui (Si le client en possède une) ou Non (s\'il n\'en possède pas)*<br/>
Numéro de carte : *Numéro de la carte fidélité du client s\'il en possède une.*<br/></h3>';

?>
</body>
</html>
