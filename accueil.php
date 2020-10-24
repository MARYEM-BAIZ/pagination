<?php

      
     try {
      $base= new PDO('mysql:host=localhost;dbname=pagination;charset=utf8','root','');
  } catch (exception $e) {
      echo " la connexion a échoué " ."<br>";
          }

          
        $requette = $base->prepare("SELECT count(id_article) as nbr_article FROM articles "); 
        $requette ->execute(array()) ;
        $re=$requette->fetch();

        $articlepartage=5;
        $articletotale=$re['nbr_article'];
        $nombrepages=ceil($articletotale/$articlepartage);
        // @$page=$_GET['page'];

         if (isset($_GET['page']) and !empty($_GET['page']) and $_GET['page']>0 and $_GET['page']<= $nombrepages ) {
               $_GET['page']= intval($_GET['page']);
               $page=$_GET['page'];
         }
         else {
           $page=1;
         }

        $debut=($page-1)*$articlepartage;
        echo $debut;
        echo "<br>";

        // activation des erreurs PDO
        $base->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      
    

       

          // $select=$base->prepare('select * from articles order by id_article asc limit ?,?');
          // $se=$select->execute(array($debut,$articlepartage));
          $select=$base->prepare('select * from articles where id_article between ? and ? order by id_article');
          $se=$select->execute(array($debut,($debut+$articlepartage)));
          var_dump($se);
          echo "<br>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/accueil.css">
    <title>accueil</title>
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
        <section class="w-75 bg-white ml-auto mr-auto ">
        <?php while ($afficher=$select->fetch()) { ?>

         <p> <?php echo $afficher['titre_article'] ?></p>
         <p><?php echo $afficher['contenu_article'] ?></p>

        <?php   } ?>
        <hr>
        </section>  
        <section>
        <article>
        <?php for ($i=1; $i <=$nombrepages ; $i++) {  
                 
          echo "<a href='?page=$i'>$i</a>";

               }  ?>
        </article>
        </section>
    </main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>