<?php
include 'database.php/db.php';
include("webPage/header.php");

$art = $bdd->prepare('SELECT * FROM billets WHERE id = ?');
$art->execute(array($_GET['id']));
$donnee= $art->fetch();
?>

<article id="art">
  <h2><?php echo $donnee['titre']; ?></h2>
  <p><?php echo $donnee['contenu']; ?></p>
</article>

<?php


$com = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet= ?');
$com-> execute(array($_GET['id']));

while ($update= $com->fetch()) {

  ?>

  <article id="art">
    <h2><?php echo $update['auteur']; ?></h2>
    <p><?php echo $update['commentaire']; ?></p>
  </article>

  <?php
}

 ?>
 <div class="row form">
  <div class="Monformulaire col s12 m6 l4 offset-m3 offset-l4">
 <form action="commentaire.php?id=<?php echo $_GET['id'];?>" method="post">

     <input type="text" name="pseudo" placeholder="Votre Pseudo"/><br />

     <textarea name="message" rows="5" cols="35" placeholder="Votre message"></textarea><br />

    <input type="submit" value="Envoyez"/>
   </form>
 </div>
</div>

   <?php


   $requete= $bdd->prepare('INSERT INTO commentaires (id_billet,auteur,commentaire,date_commentaire) VALUES(:id_billet,:auteur,:commentaire, NOW())');

   $requete->execute(array(
     'id_billet' => $_GET['id'],
     'auteur' => $_POST['pseudo'],
     'commentaire' => $_POST['message']

   ));

   include("webPage/footer.php");


    ?>
