<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Document sans titre</title>
</head>

<body>
<?php
try
{
$bdd = new PDO('mysql:host=localhost;dbname=bdentreprise;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


$reponse = $bdd->prepare("SELECT nom_employe,poste,YEAR(date_embauche) annee,salaire FROM employes WHERE YEAR(date_embauche) BETWEEN ? AND ?");
$reponse->execute(array(1981,1983));

echo "<table border='2'><caption> Salaires annuels des employés </caption>";
while ( $donnees = $reponse->fetch()) {	

	
echo "<thead> <tr><th> nom</th><th>poste </th><th> Année d'embauche<th>salaire </th> </tr></thead>";
echo "<tbody>";

echo "<tr>";
echo "<td>".$donnees['nom_employe']."</td><td>".$donnees['poste']."</td><td>".$donnees['annee']."</td>"."</td><td>".$donnees['salaire']."</td>";
echo "</tr>";

echo "</tbody></table>";

}
$reponse->closeCursor();

?>




</body>
</html>