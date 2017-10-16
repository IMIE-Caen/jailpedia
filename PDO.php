<?php

class SQLitePDO {

    public static function bdd() {
        $db = new PDO('sqlite:JailPedia.sqlite');
        //Activer les exceptions
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Cr�er la table
        $db->exec("CREATE TABLE IF NOT EXISTS ARTICLES (
                            ID INTEGER PRIMARY KEY AUTOINCREMENT,
                            Title VARCHAR(50),
                            'Text' VARCHAR(100),
                            Tag VARCHAR(25))");

        $db->exec("CREATE TABLE IF NOT EXISTS TAGS (
                            ID INTEGER PRIMARY KEY AUTOINCREMENT,
                            Name VARCHAR(25))");

        $db->exec("CREATE TABLE IF NOT EXISTS USERS (
                            ID INTEGER PRIMARY KEY AUTOINCREMENT,
                            FirstName VARCHAR(25),
                            LastName VARCHAR(25),
                            Dob DATE,
                            Email VARCHAR(50),
                            Mdp VARCHAR (25))");

        $db->exec("CREATE TABLE IF NOT EXISTS EVALUATIONS (
                            ID INTEGER PRIMARY KEY AUTOINCREMENT,
                            Article VARCHAR(50),
                            Note VARCHAR(10),
                            User VARCHAR(25))");

        $db->exec("CREATE TABLE IF NOT EXISTS CONTRIBUTIONS (
                            ID INTEGER PRIMARY KEY AUTOINCREMENT,
                            User VARCHAR(25),
                            Article VARCHAR(50))");

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
