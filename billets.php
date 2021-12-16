<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Document sans nom</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="global">

        <header>
            <a href="billets.php">
                <h1 id="titreBlog">L'actu du Web </h1>
            </a>
            <p>Dans ce blog, vous trouverez les actualités du Web</p>

        </header>

        <?php


        // Connexion à la base de données

        include_once "connexion.php";

        $billets = $bdd->query('select id, date_creation as date,'
            . ' titre, contenu from billets'
            . ' order by id desc limit 0,4');

        while ($billet = $billets->fetch()) {
        ?>
        <article>
            <header>
                <h1 class="titreBillet"><?php echo $billet['titre'] ?></h1>
                <time><?php echo $billet['date'] ?></time>
            </header>
            <p><?= $billet['contenu'] ?></p>
            <a href="commentaires.php?billet=<?php echo $billet['id']; ?>">Commentaires</a>
        </article>

        <hr />
        <?php
        }
        ?>

    </div> <!-- #contenu -->
    <footer id="piedBlog">
        Blog réalisé avec PHP 7.4, HTML5 et CSS3.
    </footer>
    </div> <!-- #global -->
</body>

</html>