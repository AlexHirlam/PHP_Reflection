
<?php

try {
    
    $db = new PDO('sqlite:'.__DIR__.'/database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // $sql = "CREATE TABLE People (
        //     ID INTEGER PRIMARY KEY AUTOINCREMENT ,
        //     username varchart(30) NOT NULL,
        //     email VARCHART(40) NOT NULL,
        //     password VARCHART(255) NOT NULL
        // )";


        //     $sql = "CREATE TABLE GameReview (
        //     review_ID INTEGER PRIMARY KEY AUTOINCREMENT ,
        //     gametitle varchart(30) NOT NULL,
        //     review_description VARCHART(255) NOT NULL,
        //     overall_rating INTEGER NOT NULL
        // )";


    }
    catch ( \Exception $e ) 
{
    echo 'Error connecting to the Database: ' . $e->getMessage();
    exit;
}