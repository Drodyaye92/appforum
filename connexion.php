<?php 
    try{
        $username = 'root';
        $password = '';
        $bdd = new PDO("mysql:host=localhost;dbname=developpeur", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
       
    }
    catch(PDOException $e){
        echo "Erreur : ". $e->getMessage();
    }
?>