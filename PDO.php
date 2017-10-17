<?php

class SQLitePDO {

    public static function bdd() {
        $db = new PDO('sqlite:JailPedia.sqlite');
        //Activer les exceptions
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Cr�er la table
        $db->exec("CREATE TABLE IF NOT EXISTS ARTICLES (
                            id INTEGER PRIMARY KEY AUTOINCREMENT,
                            title VARCHAR(50),
                            text VARCHAR(100),
                            tag VARCHAR(25))");

        $db->exec("CREATE TABLE IF NOT EXISTS TAGS (
                            id INTEGER PRIMARY KEY AUTOINCREMENT,
                            Name VARCHAR(25))");

        $db->exec("CREATE TABLE IF NOT EXISTS USERS (
                            id INTEGER PRIMARY KEY AUTOINCREMENT,
                            firstname VARCHAR(25),
                            lastname VARCHAR(25),
                            dob DATE,
                            email VARCHAR(50),
                            mdp VARCHAR (25))");

        $db->exec("CREATE TABLE IF NOT EXISTS EVALUATIONS (
                            id INTEGER PRIMARY KEY AUTOINCREMENT,
                            article VARCHAR(50),
                            note VARCHAR(10),
                            user VARCHAR(25))");

        $db->exec("CREATE TABLE IF NOT EXISTS CONTRIBUTIONS (
                            id INTEGER PRIMARY KEY AUTOINCREMENT,
                            user VARCHAR(25),
                            article VARCHAR(50))");

        return $db;
        }

    }
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
