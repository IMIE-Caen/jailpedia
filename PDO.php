<?php

    $db = new PDO('sqlite:JailPedia.sqlite');
    //Activer les exceptions
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Cr�er la table
    $db->exec("CREATE TABLE IF NOT EXISTS ARTICLES (
                        id INTEGER PRIMARY KEY AUTOINCREMENT,
                        title VARCHAR(100),
                        text VARCHAR(100),
                        tag VARCHAR(100))");

    $db->exec("CREATE TABLE IF NOT EXISTS TAGS (
                        ID INTEGER PRIMARY KEY AUTOINCREMENT,
                        NOM VARCHAR(100))");

    $db->exec("CREATE TABLE IF NOT EXISTS USERS (
                        ID INTEGER PRIMARY KEY AUTOINCREMENT,
                        PRENOM VARCHAR(100),
                        NOM VARCHAR(100),
                        DATE_DE_NAISSANCE DATE,
                        EMAIL VARCHAR(100))");

    $db->exec("CREATE TABLE IF NOT EXISTS EVALUATIONS (
                        ID INTEGER PRIMARY KEY AUTOINCREMENT,
                        ARTICLE VARCHAR(100),
                        NOTES integer(3),
                        USERS VARCHAR(100))");

    $db->exec("CREATE TABLE IF NOT EXISTS CONTRIBUTIONS (
                        ID INTEGER PRIMARY KEY AUTOINCREMENT,
                        ARTICLE VARCHAR(100),
                        USERS VARCHAR(100))");

                        /*
    $sql = 'INSERT INTO ARTICLES (ME_NAME) values(:ME_NAME)';
    $stmt = $db->prepare($sql);
    //Param�tre PDO
    $P = array('ME_NAME' => 'La pire prison du monde');
    //Executer la requete
    $stmt->execute($P);
    $stmt->closeCursor();

    $sql = 'INSERT INTO USERS (ME_NAME, ME_LASTNAME) values(:ME_NAME, :ME_LASTNAME)';
    $stmt = $db->prepare($sql);
    //Param�tre PDO
    $P = array('ME_NAME' => 'Neant',
                'ME_LASTNAME' => 'Du14');
    //Executer la requete
    $stmt->execute($P);
    $stmt->closeCursor();
*/
?>
