<?php
    $dsn = 'mysql:host=localhost;dbname=mabase';
    $user = 'root';
    $password = '';
    try {
        $cnx = new PDO($dsn, $user, $password);
        $cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Ici l'attribut des erreurs est 
        //défini en mode d'affichage ERRMODE EXCEPTION
   
  
        }catch(PDOException $e) {
        echo "Une erreur est survenue";
        
    }
  $sql = "select * from client";//la requete faussée
  // Ici la requête est exécutée.Si elle fonctionne, le script jouera uniquement le TRY. Si elle ne fonctionne pas,
   
   try{
       $rs_req = $cnx->query($sql);
      while ($donnees=$rs_req->fetch(PDO::FETCH_OBJ)) {
      echo '<pre>';
      print_r($donnees);
      echo '</pre>';
       }

    }catch(PDOException $e){
        echo "un probleme est survenu";
 }  
      
      
?>  
    