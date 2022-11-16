<?php
    //include_once("config.php");
    //echo json_encode($_POST);
    $success = 0;
    $msg = "ERREUR (script.php)";

    /*donnéé pour accéder a la base de donnée*/
    $host = "localhost";
    $port = 3306; //port par defaut
    $dbname = "argonaute";
    $user = "root";
    $pwd = "";

    // Try Catch pour les exceptions et les erreurs
    try{
        $bdd = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pwd);
        $success = 1;
        $msg="";
        $res = ["success" => $success, "msg" => $msg];
        echo json_encode($res);
    }catch(PDOException $e){
        die('Erreur :' .$e->getMessage());
    }

    if(isset($_POST['nom'])){ //isset defini si la variable est déclarée ou différente de null
        $insert = $bdd -> prepare('INSERT INTO inscrit VALUES(:nom)');
        $insert->bindValue(':nom', $_POST['nom']);

        $verif = $insert->execute();
        /*if($verif){
            echo 'Insert reussie';
        }else{
            echo 'echec insert';
        }*/

    }else{
        echo 'Problème de variable';
    }

?>