<?php
try
{
    $bdd = new PDO('mysql:host=localhost:3306;dbname=monblog;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

