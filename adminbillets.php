<!DOCTYPE HTML>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Document sans nom</title>
</head>

<body>
    <div id="global">

        <header>
            <a href="billets.php">
                <h1 id="titreBlog">Mon Blog</h1>
            </a>
            <p>Administration du blog.</p>

        </header>

        <?php


        try {
            $bdd = new PDO('mysql:host=localhost;dbname=monblog;charset=utf8', 'root', '');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }


        $billets = $bdd->query('select id, date_creation as date,'
            . ' titre, contenu from billets'
            . ' order by id desc');
        echo "<table> <caption> Liste des articles </caption> <thead> <tr> <th> identifiant </th> <th> Auteur </th><th> date de création </th><th> Titre</th></tr> </thead><tbody>";

        while ($billet = $billets->fetch()) {
        ?>
        <tr>
            <td> <?php echo $billet['id'] ?> </td>
            <td> class="titreBillet"><?php echo $billet['auteur'] ?></td>
            <td><time><?php echo $billet['date'] ?></time></td>
            <td> <?php echo $billet['titre'] ?> </td>
            </header>

            <a href="commentaires.php?billet=<?php echo $billet['id']; ?>">Commentaires</a>
        </tr>


        <?php
        }
        ?>
        </tbody>
        </table>

    </div> <!-- #contenu -->
    <footer id="piedBlog">
        Blog réalisé avec PHP, HTML5 et CSS3.
    </footer>
    </div> <!-- #global -->
</body>

</html>