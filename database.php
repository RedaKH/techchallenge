<?php
class database
{
private $username;
private $servername;
private $password;
private $dbname;

/*
On va créer une classe pour la base de données et mettre les fonctions de création des membres et la récuperation des utilisateurs
mais aussi voir si le membre existe deja dans la bdd 
*/
public function connect(){
    $this->servername="localhost";
    $this->username="root";
    $this->password="root";
    $this->dbname="Argonaut";

    $conn = new mysqli( $this->servername,$this->username,$this->password,$this->dbname);
    return $conn;

    try {
        
        $dsn="mysql:host=".$this->servername.";dbname=".$this->dbname;
        $pdo = new PDO($dsn,$this->username,$this->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        
        echo "ERREUR ".$e->getMessage();
    }



}

public function getAllUsers(){
    
        $db = new Database();
        $connection = $db->connect();
        $result = $connection->query("SELECT * From membre");
        return $result;

}

public function insertMembre($nom){

$conn=$this->connect();
   $insert = mysqli_query($conn,"INSERT INTO membre(Nom)VALUES ('".$nom."')");
        

    return $insert;

}

public function membreexist($nom){
    $conn=$this->connect();

    $select = mysqli_query($conn,"SELECT Nom FROM membre WHERE Nom = ".$nom);
   
   if(mysqli_num_rows($select)>0){
      echo'';
   }
  

}

}


?>