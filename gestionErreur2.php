<?php
    $dsn = 'mysql:host=localhost;dbname=mabase';
    $user = 'root';
    $password = '';
    
    try{
        //pr gere la gestion des erreur au moment de la connection 
        $cnx = new PDO($dsn, $user, $password);
        //le warning donne plus de detaille sur les arreur 
        $cnx -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }
       catch(PDOException $e){
        echo "une erreur est survenue";
        }
       $sql = "select * from produits";
       $rs_req = $cnx->query($sql);   
   
       while($donnees=$rs_req ->fetch(PDO::FETCH_ASSOC)){
        echo '<pre>';
        print_r ($donnees);
        echo'</pre>';
    }
?>