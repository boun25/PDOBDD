<?php
/*
  LA classe PDO
  le role de la classe PDO est de servir d'interface d'accé à une base de donnés , pr voutre site internet . 
  Objectif :
    -découvride les fonctionnalite de cette classe pdo 
    -sélectionner , insérer , modife et supprimer des données 

    Qu'est ce que PDO ?
PDO signifie PHP Data Objects. PDO est une extension PHP orientée objet incluse depuis la version 5.1 de PHP, 
dont le rôle est de servir d'interface d'accès à une base de données.
L'objet PDO permet donc de communiquer avec une base de données, et ceci peu importe le type SGBD (Mysql, Oracle, etc...)
.
CONNEXION A UNE BASE DE DONNES
Auparavant, pour nous connecter à une base données, nous utilisions la fonction mysql_connect().
Cette connexion est devenue totalement obsolète avec l'arrivée de PHP 7. Elle a été remplacée par deux nouvelles extensions : PDO et Mysqli.
PDO pour se connecter à une base de données
Définition des variable par définir nos variable de connexion 

*/
$dsn = 'mysql : host = localhost ; dbname =maBase ';
$user = 'root';
$password = ' ';
/*Explication:
$dsn: contient le type de la base de données (mysql), l'adresse du serveur(ici localhost) ainsi que le nom de la bdd (ici maBase).
$user contient le login de la connexion à la bdd (ici root).
$password contient le mot de passe de connexion à la bdd (ici rien).
I
Initialisation de l'objet PDO
Une fois nos variables de connexion définies, nous devons ensuite initialiser l'objet PDO, comme cici:*/ 
$cnx = new PDO($dsn $user, $password);
/*Explication: Nous initialisons l'objet PDO et nous le stockons dans une variable nommée $cnx. $c paramètres de connexion de notre base de données.
Conclusion
Nous venons de créer un objet PDO pour nous connecter à notre base de données mysql.

​
​
Gestion d'une erreur éventuelle de connexion
Si pour une raison quelconque, une erreur de connexion à la base de données survenait, nouss alloons gérer cette erreur et non la subir. En effet, en cas d'erreur, MySQL renvie un message d'erreur, et ce message peut contenir des données sensibles.
"lable nommee $cnx. $cnx les
exemple: nous allons reprendre nos variables de connexion à notre base de données et nous allons modifier le login de la variable $user et ajouter un mot de passe à notre variable $password, afin de générer une erreur de connexion. Puis nous initialisons l'objet PDO.*/
$dsn = 'mysql: host=localhost; dbname=casse2' ;|
    $user = 'toto';
    $password = 'tata';
    $cnx = new PDO($dsn, $user, $password);
    
    /**ensuit ns lancon de page ds la browser . nous nous attendons une erreur  pusque le couple user /password n'est pas correct 
     * "nous puvons observer une faille  de  sécurité indéniable . le couple eser /password apparait clairement 
     * pr rémédier à cele nous allon utilise les blocs TRY/CATCH 
     * 
     * **le couple TRY/CATCH 
     * le couple TRY /CATCH va ns permetre de pouvoir gérer une erreur de connexion à la base de donne et d"en personnaliser le message 
     * 
     * --preincipe de fonction 
     * TRY va tente de se connecter à la bade de donnéé et s'il ya une erreur , caTCH fera en sorte de revoyer un message d'erreur que nons allon personnalise . cette erreur sara déclaréé sous la forme d'eue exception 
     * 
     *  */

     try{
      $cnx = new PDO ($dn , $user , $password )

     }catch (PDOException $e ){
      echo "une erreur est survenue";

     } 
​
/*
  Nous relançons la page dans notre navigateur et cette fois, le message d'erreur qui va s'afficher sera le suivant :
  erreur est survenue !

  Conclusion

  Vous venez d'apprendre à vous connecter à une base de données en utilisant l'objet PDO de PHP.
  nb: En cas de problème, tout ce qui se trouve à l'intérieur du TRY sera stoppé au profit de ce qui se trouve à 1'intérieur du CATCH. Et si tout va bien, alors seulement ce qui qui se trouve à l'intérieur du TRY sera exécuté.*/
   
  /* AFFICHER DES DONNEES AVEC PDO* Ecrirture de la requête
$sql = select * from clients;

/*Exécution de la requete
Pour exécuter cette requête nous récupérons l'objet PDO et nous effectuons une requête query. Nous stockons cette requête dans une variable nommée $rs_req.
$rs_req= $cnx->query($sql);

Nous allons mainteant récupérezr les données de notre requête. Pour cela nous utilisons une boucle while ainsi que la méthode fetch()
on affiche à la variable $données , chaque eregistrement de la table client */
    
  while($donnees  = $rs_req ->query()){
    echo '<pre>';
    print_r ($donnees);
    echo'</pre>';
  }
    /*On obtient chaque ligne de notre table clients, rangée dans un tableau (Array) et chaque tableau (array) contient: - un tableau associatif
- un tableau numérique. I

Conclure
Par défaut, le comportement de PDO est d'envoyer la méthode fetch() avec en retour un tableau associatif et un tableau numérique.
 L'association PDO::FETCH_ASSOC
Nous pouvonspouvons modifier ce comportement en précisant le type d'association à utiliser. Pour cela, nous allons ajouter à la méthode fetch(), le type d'association que nous souhaitons voir apparaitre. Pour faire apparaotre uniquement le résultat sous la forme d'un tableau associatif, nous écrirons: PDO::FECTH_ASSOC, à la méthode fetch()

 *****L'association PDO::FETCH_BOTH
 par défaut , la constante utilise par PDO est PDO ::FETCH_BOTH , qui signifier envoyer les deux tableaux ( associative et numerique ).


 **L'association PDO::FETCH_OBJ
 une quatriéme constante peut etre utilisee, PDO ::FETCH_OBJ, qui donne en retour un objet . le code suivent infique au précedent a la différence de l'ajout de tupe PDO::FETCH_OBJ ala méthode fetch()
*/
while($donnees= $req ->fetch(PDO::FETCH_OBJ)){
  echo '<pres>';
  print_r($donnees);
  echo'</pre>';
}
/* Dans la pratique, on utilise le plus souvent les deux types d'associations: ASSOC et OBJ.
****Gestion des erreurs sql
Comme nous l'avons fait à l'initialisation de l'objet PDO lors de la mise en place de la connexion à notre base de données, nous allons protéger nos requêtes SQL, en bloquant le code en cas d'ereur, grâce au couple TRY/CATCH. Pour cela nous allons d'abord définir un attribut à notre variable de connexion à la base de données : $cnx, afin de modifier l'affichage des erreurs.
cela donnera :
$cnx->setAttribut (PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);

a- Les différents types d'affichage des erreurs
  Il est existe trois types d'affichage des erreurs: ERRMODE_SILENT (Affichage par )
  ERROMODE WARNING
  ERROMODE EXCEPTION
  Nous allons voir les trois types d'affichage d'erreurs. Nous allons provoquer une erreur SQL en faisant une requête non pas dans la table clients mais dans la table client qui n'existe pas. Notre requête SQL deviendra alors: $sql = "SELECT * FROM clients";

--premier type d'affiche des erreurs sql : Erromode_SILENT 
ERROMODE_SILENT est le mode d'aafichage par défaut . ce mode D'affichage achiche une erreur sans en prcise r la cause 
    try{
     $cnx = new PDO($dsn, $user, $password);
      $cnx = setAttribute (PDO::ATTR_ERRMODE, PDO:: ERRMODE_SILENT); // ici l'attribut des erreurs est défini en mode d'affichage ERRMODE_SILENT
      echo "tout s'est bien passé ! "; 
    }catch (PDOException $e){
      echo "Une erreur est survenue !";
    }
----DEUxieme type d'affichage des erreurs sql : ERRMODE_WARNING 
ERRMODE_WARNING permet 'affiche le détail de l'erreur. Ce mode peut-être opportun en cours de développement afin d'identifier rapidememnt les erreurs éventuelles. Notre code ressemblera à ceci :
try {
    $cnx = new PDO($dsn, $user, $password);
    $cnx = setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_WARNING);
    echo "tout s'est bien passé ! ";
  }catch (PDOException $e) {
  echo "Une erreur est survenue !" ;
  }

---Troisième type d'affichage des erreurs sql: ERRMODE EXCEPTION
ERRMODE EXCEPTION permet en cas d'erreur, d'envoyer une exception. Cela nous permet donc de récupérer cette exception au travers du couple TRY/CATCH et ainsi de personnaliser le message d'erreur qui apparaitra à l'écran.
 try {
      $cnx = new PDO($dsn, $user, $password);
      $cnx = setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE EXCEPTION); //Ici l'attribut des erreurs est 
      défini en mode d'affichage ERRMODE EXCEPTION
    echo "tout s'est bien passé ! ";

}catch(PDOException $e) {
echo "Une erreur est survenue


$sql = "select * from client"://la requete faussée
try // Ici la requête est exécutée.Si elle fonctionne, le script jouera uniquement le TRY. Si elle ne fonctionne pas,
 le script ira directement jouer le CATCH.
 try{
     $rs_req = $cnx->query($sql);
    while ($donnees=$rs_req->fetch(PDO::FETCH_OB])) {
    echo '<pre>';
    print_r($donnees);
    echo '</pre>';
     }
    catch (PDOExeception $e){
      echo "un probleme est survenu ";
    }   

    nous venons de voir les bases de la mise en place de la classe PDO



  */
    ?>