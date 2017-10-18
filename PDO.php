<?php

class SQLitePDO{

    public static function bdd() {
        $db = new PDO('sqlite:JailPedia.sqlite');
        //Activer les exceptions
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Cr�er la table
        $db->exec("CREATE TABLE IF NOT EXISTS USERS (
                            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                            firstname VARCHAR(25),
                            lastname VARCHAR(25),
                            dob DATE,
                            email VARCHAR(50),
                            password VARCHAR (25),
                            role VARCHAR (25))");

        $db->exec("CREATE TABLE IF NOT EXISTS ARTICLES (
                            id INTEGER PRIMARY KEY AUTOINCREMENT,
                            title VARCHAR(50),
                            text MESSAGE_TEXT
)");

        $db->exec("CREATE TABLE IF NOT EXISTS TAGS (
                            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                            name VARCHAR(100))");

        $db->exec("CREATE TABLE IF NOT EXISTS IMAGES (
                            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                            articleID INTEGER NOT NULL,
                            name VARCHAR(255),
                            FOREIGN KEY  (articleId) REFERENCES ARTICLES(id))");

        $db->exec("CREATE TABLE IF NOT EXISTS EVALUATIONS (
                            note INTEGER,
                            articleId INTEGER NOT NULL,
                            userId INTEGER NOT NULL,
                            PRIMARY KEY (articleId, userId),
                            FOREIGN KEY (articleId) REFERENCES ARTICLES(id),
                            FOREIGN KEY (userId) REFERENCES USERS(id)
                            )");

        $db->exec("CREATE TABLE IF NOT EXISTS CONTRIBUTIONS (
                            userId INTEGER NOT NULL,
                            articleId INTEGER NOT NULL,
                            PRIMARY KEY (userId, articleId),
                            FOREIGN KEY (userId) REFERENCES USERS(id),
                            FOREIGN KEY (articleId) REFERENCES ARTICLES(id)
                            )");

        $db->exec("CREATE TABLE IF NOT EXISTS CATEGORISATION (
                            articleId INTEGER NOT NULL,
                            tagId INTEGER NOT NULL,
                            PRIMARY KEY (articleId,tagId),
                            FOREIGN KEY (articleId) REFERENCES ARTICLES(id),
                            FOREIGN KEY (tagId) REFERENCES TAGS(id)
)");

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
