<?php 
require_once ('connexion.php');
if(isset($_POST['push'])){ 

  $email = htmlspecialchars($_POST['email']);
  $id_pub = date("h:i:sa");
  $reponse = htmlspecialchars($_POST['reponse']);
  $insert=$bdd->prepare("INSERT INTO commentaire(email,reponse)VALUES(?,?)");
  $insert->execute(array(
                 $email,
                 $reponse
                  ));

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les Posts </title>
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
  
</head>
<body>
<section class="container-fluid">
   <section class="row">
       <section class=" col-lg-5 col-md-5 col-mx-12 gauche">
           <div class="cote"> 
            <div>
               <img src="images/lacsoftforum.png" alt="" width="350px">
            </div> 
        
         <div action=" " method="POST">
         <div class="form">
         <div class="tab-tete">
               <div class="active"><button><a href ="commentaire.php">See profile</a></button></div>
               <div><button><a href="publication.php">FORUM</a> </button> </div>
               <div><button><a href="dashtraitement.php"> Dashbord</a></button> </div>
               <div><button> <a href="registration.php">Register</a></button> </div>
            </div>
         </div> 
         </div>  
  
           </div>
        </section> 
        <section class=" droite col-lg-7 col-md-7 col-sm-12">
<div > 
    <h3 class="foru text-center"> FORUM </h3>
 <div class="text-right"><button  type="submit" name="send"><a href="publication.php">Creer un Topic</a></button></div>

<div class=""><input type="text" name="Recherche" placeholder="Rechercher" required="required" class="font-weight-bold"/> 

<button type="submit" name="envoyer"> SEND </button></div>
</div>

<?php
    $resulta = $bdd->query("SELECT * FROM publication ORDER BY categorie");
    if (!$resulta){
        echo"la recuperation a echoue";
    }else{
       // $nbre = $resulta->rowCount();
    }
?>

 <h4 class="text-center text-uppercase text-dark border bg-info m-3">La table des publications enregistrées</h4>
 <?php
    while($datas = $resulta->fetch()){
 ?>
        <div class=" d-block">
           <div class="blo"> <p>  <?=  $datas["id_pub"] ?></p> 
            <h4 class="blocus"> <a href=" commentaire.php"> <?= $datas["categorie"]?></a></h4>
        </div>
           <div class="blocu"> <h5>  <?=  $datas["message_pub"] ?></h5>
            <p class="bloc hidden">  <?= $datas["date_pub"] ?></p>
        </div>
       </div>
     
      <!-- <textarea name="reponse" id="" cols="30" rows="2" placeholder="veuillez entrer votre reponse" class="w-100"></textarea>
       <button  type="button" class="butt bg-info" data-toggle="modal" data-target="#myModal"> Commenter </button>-->
           
<button type="button" class="bloc btn btn-primary" data-toggle="modal" data-target="#myModal">
  Commenter
 </button>

  <!-- le modal-->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Entrez une reponse</h4>
      </div>
      <form action="" method="POST">
       <div class="modal-body">
        <input type="email" class="formcontrol w-100 mb-4" placeholder="email" name="email">
        <textarea name="reponse" id="" cols="30" rows="10" class="w-100"></textarea>
      </div>
      <div class="modal-footer">
       <button type="submit" class="btn btn-primary" name="push" >Envoyer</button>
      </div>
      </form>
    </div>
  </div>
</div>

      
      <?php
    }
    ?>
    </div>
  </div>
</div>

    </section>
    </section>
</section> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>