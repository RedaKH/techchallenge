<?php
  include'database.php';
  /*
  On va appeler la méthode de connection a la base de donnée pour ensuite faire une condition si le bouton sumbit aété appuyé  pas
  été appuyé alors on va inserer le membre dans la bdd
  */

$argonaut = new database;
$argonaut->connect();


if(isset($_POST['submit'])){
  $nom=$_POST['name'];
  $argonaut->insertMembre($nom);
 





}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <title>Document</title>
</head>
<body>
 
    <!-- Header section -->
<header>
  <h1>
    <img src="https://www.wildcodeschool.com/assets/logo_main-e4f3f744c8e717f1b7df3858dce55a86c63d4766d5d9a7f454250145f097c2fe.png" alt="Wild Code School logo" />
    Les Argonautes
  </h1>
</header>

<!-- Main section -->
<main>
  
  <!-- New member form -->
  <h2>Ajouter un(e) Argonaute</h2>
  <form class="new-member-form" method="POST">
    <label for="name">Nom de l&apos;Argonaute</label>
    <input id="name" name="name" type="text" placeholder="Charalampos" />
    <button type="submit" name="submit">Envoyer</button>
  </form>
  
  <!-- Member list -->
  <h2>Membres de l'équipage</h2>
  <?php
  /*
  On va appeler la classe database et la méthode get all users pour faire une condition si le membre a bien été saisi alors
  on va afficher les trois colonnes et les noms à partir d'une boucle foreach 
  */
  $membre = new Database();
  $membre->getAllUsers();

  
 
  $membres = $membre->getAllUsers();

  if($membres){ ?>
    <section class="member-list">
      <?php foreach($membres as $m ) { ?>
        <div class="member-item"><?=$m['Nom']?></div>
      <?php } ?>
    </section>
  <?php }?>
    
 
 
  </section>   
 
  <?php
  
  ?>

</main>

<footer>
  <p>Réalisé par Jason en Anthestérion de l'an 515 avant JC</p>
</footer>
</body>
</html>