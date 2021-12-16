<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Mon blog</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>

    <div id="global">
        <h1 id="titreBlog">L'actu du Web</h1>
        <p><a href="billets.php">Retour à la page d'accueil du Blog </a></p>

        <?php
        // Connexion à la base de données
        include_once "connexion.php";

        // Récupération du billet
        $id_billet = $_GET['billet'];

        $req = $bdd->prepare('SELECT id,titre,contenu,DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
        $req->execute(array($id_billet));

        $donnees = $req->fetch();

        ?>

        <article>
            <header>
                <h1 class="titreBillet"><?php echo htmlspecialchars($donnees['titre']); ?> </h1>
                <time><em>le <?php echo $donnees['date_creation_fr']; ?></em></time>

            </header>
            <p>
                <?php
                echo nl2br(htmlspecialchars($donnees['contenu'])); // nl2br — Insère un retour à la ligne HTML à chaque nouvelle ligne
                // htmlspecialchars — Convertit les caractères spéciaux en entités HTML
                ?>
            </p>
        </article>

        <h1 class="titreCommentaire">Commentaires</h1>

        <?php
        $req->closeCursor(); // Important : on libère le curseur pour la prochaine requête


        $req = $bdd->prepare('SELECT auteur, contenu, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire_fr');
        $req->execute(array($id_billet));
        if ($req) {
            while ($donnees = $req->fetch()) {
        ?>
        <p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le
            <?php echo $donnees['date_commentaire_fr']; ?></p>
        <p><?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?></p>
        <?php
            } // Fin de la boucle des commentaires

        }
        $req->closeCursor();
        ?>
    </div>
</body>

</html>