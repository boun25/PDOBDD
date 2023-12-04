<?php
    $dsn = 'mysql:host=localhost;dbname=mabase';
    $user = 'root';
    $password = '';
    
    try{
        $cnx = new PDO($dsn, $user, $password);
        $cnx -> setAttribute (PDO::ATTR_ERRMODE, PDO:: ERRMODE_SILENT);
      
       }catch(PDOException $e){
        echo "une erreur est survenue";
        
      }
       $sql = "select * from produits";
       $rs_req = $cnx->query($sql);   
       //c'est sout PDO::FETCH_ASSOC ou PDO::FETCH_NUM
    while($donnees=$rs_req ->fetch(PDO::FETCH_ASSOC)){
        echo '<pre>';
        print_r ($donnees);
        echo'</pre>';
    }
?>