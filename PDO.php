<?php

    $db = new PDO('sqlite:JailPedia.sqlite');
    //Activer les exceptions
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Créer la table
    $db->exec("CREATE TABLE IF NOT EXISTS ARTICLES (
                        ME_ID INTEGER PRIMARY KEY AUTOINCREMENT,
                        ME_NAME VARCHAR(100))");

    $db->exec("CREATE TABLE IF NOT EXISTS TAGS (
                        ME_ID INTEGER PRIMARY KEY AUTOINCREMENT,
                        ME_NAME VARCHAR(100))");

    $db->exec("CREATE TABLE IF NOT EXISTS USERS (
                        ME_ID INTEGER PRIMARY KEY AUTOINCREMENT,
                        ME_NAME VARCHAR(100),
                        ME_LASTNAME varchar(100))");

    $db->exec("CREATE TABLE IF NOT EXISTS EVALUATIONS (
                        ME_ID INTEGER PRIMARY KEY AUTOINCREMENT,
                        ME_NOTES integer(3))");

    $db->exec("CREATE TABLE IF NOT EXISTS CONTRIBUTIONS (
                        ME_ID INTEGER PRIMARY KEY AUTOINCREMENT,
                        ME_NAME VARCHAR(100))");

                        /*
    $sql = 'INSERT INTO ARTICLES (ME_NAME) values(:ME_NAME)';
    $stmt = $db->prepare($sql);
    //Paramètre PDO
    $P = array('ME_NAME' => 'La pire prison du monde');
    //Executer la requete
    $stmt->execute($P);
    $stmt->closeCursor();

    $sql = 'INSERT INTO USERS (ME_NAME, ME_LASTNAME) values(:ME_NAME, :ME_LASTNAME)';
    $stmt = $db->prepare($sql);
    //Paramètre PDO
    $P = array('ME_NAME' => 'Neant',
                'ME_LASTNAME' => 'Du14');
    //Executer la requete
    $stmt->execute($P);
    $stmt->closeCursor();
*/
?>
