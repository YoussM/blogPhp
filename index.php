<?php
include("database.php/db.php");
include("webPage/header.php");

$req = $bdd->query('SELECT * FROM billets');

while ($reponse =$req->fetch()) {
?>
  
<article id="art">
  <h2><?php echo $reponse['titre']; ?></h2>
  <p><?php echo $reponse['contenu']; ?></p>
  <a href="commentaire.php?id= <?php echo $reponse['id']; ?>">Commentaire</a>
</article>


<?php
}

$req->closeCursor();
include("webPage/footer.php");
 ?>
