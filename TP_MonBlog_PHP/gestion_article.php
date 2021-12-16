<?php 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bd_monblog_php','root','');
}
catch (Exception $e)
{
    die('erreur:'. $e->getMessage());
}

$reponse = $bdd->query('SELECT* FROM articles');
while ($donnees = $reponse->fetch())
{
?>
<p>
    les auteurs sont : <?php echo $donnees ['auteur_article']; ?>
</p>
<?php
}
$reponse->closeCursor();
?>