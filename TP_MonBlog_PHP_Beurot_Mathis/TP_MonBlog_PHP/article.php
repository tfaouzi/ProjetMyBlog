<?php 
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bd_monblog_php','root','');
}
catch (Exception $e)
{
    die('erreur:'. $e->getMessage());
}

$reponse = $bdd->query('SELECT* FROM articles WHERE id_billet = 11');

while ($donnees = $reponse->fetch())
{
?>

<p>
    
    <center><h1> <?php echo $donnees['titre_billet']; ?></h1><br/></center>
            <h3><?php echo $donnees['date_creation']; ?></h3>
            <h2><?php echo $donnees['contenu_billet']; ?></h2> <br>
    l'auteur de l'article est : <?php echo $donnees ['auteur_article']; ?>
</p>



<?php
}
$reponse->closeCursor();

?>
<?php
$reponse = $bdd->query('SELECT* FROM articles WHERE id_billet = 12');

while ($donnees = $reponse->fetch())
{
?>

<p>
    
    <center><h1> <?php echo $donnees['titre_billet']; ?></h1><br/></center>
            <h3><?php echo $donnees['date_creation']; ?></h3>
            <h2><?php echo $donnees['contenu_billet']; ?></h2> <br>
    l'auteur de l'article est : <?php echo $donnees ['auteur_article']; ?>
</p>



<?php
}
$reponse->closeCursor();

?>
<?php

$reponse = $bdd->query('SELECT* FROM articles WHERE id_billet = 13');

while ($donnees = $reponse->fetch())
{
?>

<p>
    
    <center><h1> <?php echo $donnees['titre_billet']; ?></h1><br/></center>
            <h3><?php echo $donnees['date_creation']; ?></h3>
            <h2><?php echo $donnees['contenu_billet']; ?></h2> <br>
    l'auteur de l'article est : <?php echo $donnees ['auteur_article']; ?>
</p>



<?php
}
$reponse->closeCursor();
?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">

    <title>Blog</title>
</head>
<body>
    <!-- Liste de tous les articles -->
    <article class="articles">
        <h1>Articles :</h1>
        <article class="article">
            <center><h1> quand on aime les pates </h1></center>
            <h2>13 sept 2021</h2>
            <p>Article n°1</p>
            <a href=""> Commentaire </a> 
        </article>
        <article class="article">
        <center><h1> la passion des fruits andros </h1></center>
            <h2>14 sept 2021</h2>
            <p>Article n°2</p>
            <a href=""> Commentaire </a> 
        </article>
        <article class="article">
        <center><h1> jul porte des claquettes  </h1></center>
            <h2>15 sept 2021</h2>
            <p>Article n°3</p>
            <a href=""> Commentaire </a> 
        </article>
    </article>
</body>
</html>


 
<style>
.articles {
    margin: 0;
    padding: .3rem;
    background-color: #eee;
    font: 1rem 'Fira Sans', sans-serif;
}
 
.articles > h1,
.article {
    margin: .5rem;
    padding: .3rem;
    font-size: 1.2rem;
}
 
.article {
    background: right/contain content-box border-box no-repeat
        url('/media/examples/rain.svg') white;
}
 
.articles > h2,
.article > p {
    margin: .2rem;
    font-size: 1rem;
}
</style>