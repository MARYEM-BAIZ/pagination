<?php

     try {
         $base= new PDO('mysql:host=localhost;dbname=pagination;charset=utf8','root','');
     } catch (exception $e) {
         echo " la connexion a échoué " ."<br>";
             }

             if (isset($_POST['ajouter'])) {
                  
                $titre=strip_tags($_POST['titre']);
                $titre=htmlspecialchars($_POST['titre']);

                $contenu=strip_tags($_POST['contenu']);
                $contenu=htmlspecialchars($_POST['contenu']);

                $inserer=$base->prepare(' insert into articles(titre_article,contenu_article) values(?,?)');
                $ins=$inserer->execute(array($_POST['titre'],$_POST['contenu']));
                // var_dump($ins);
                // echo "<br>";
             }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/accueil.css">
    <title>ajou article</title>
</head>
<body>
<header>
    <!--Navbar-->
<nav class="navbar navbar-expand-lg bg-info primary-color">

<!-- Collapse button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
  aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="basicExampleNav">

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
   
    <li class="nav-item">
      <a class="nav-link text-muted" href="accueil.php">accueil</a>
    </li>

    <!-- Dropdown -->
    <li class="nav-item dropdown ">
      <a class="nav-link text-muted pull-right dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">plus</a>
      <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item text-muted" href="ajout_article.php">ajouter un article</a>
      </div>
    </li>

  </ul>
  


</nav>
<!--/.Navbar-->
    </header>
 <main class="bg-muted">
 <p class="h1 text-muted text-center mt-5">ajout article</p>
    <section  class="w-50 ml-auto mr-auto bg-white" >
    <form action="#"  class="text-center border border-light p-5" method="post">
    <input type="text" name='titre' class="form-control mb-4" placeholder="écrire le titre d'article">
    <input type="text" name="contenu" class="form-control mb-4" placeholder="écrire le contenu d'article">
    
    <button class="btn btn-info btn-block my-4" name="ajouter"  type="submit">ajouter</button>
    </form>
    </section>
 </main>   

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>