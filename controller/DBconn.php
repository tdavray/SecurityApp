<?php
function co()
{
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=efrei', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;
}