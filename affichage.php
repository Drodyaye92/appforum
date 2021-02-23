<?php
session_start();
require_once ('connexion.php');
$bdd = new PDO("mysql:host=localhost;dbname=developpeur","root", "");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<?php 
require_once('connexion.php');
if(isset($_POST['push'])){
      $email = $_POST['email'];
      $reponse = htmlspecialchars($_POST['reponse']);
      $date_com= date("h:i:sa");
      $insert=$bdd->prepare("INSERT INTO commentaire(email,reponse,date_com) VALUES(?,?,?)");
      $insert->execute(array(
         $email,
         $reponse,
         $date_com
         
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
       <section class=" col-lg-4 col-md-4 col-mx-12 gauche">
           <div class="cote"> 
            <div>
               <img src="images/lacsoftforum.png" alt="" width="350px">
            </div> 
        
         <div action=" " method="POST">
         <div class="form">
            <div class="tab-tete">
               <div class="active"><button>See profile</button></div>
               <div><button> FORUM</button> </div>
               <div><button> Dashbord</button> </div>
               <div><button> Register</button> </div>
            </div>
         </div> 
         </div>  
  
           </div>
        </section> 
        <section class="col-lg-8 col-md-8 col-sm-12">
<div > 
    <h3 class="foru text-center"> FORUM </h3>
 <div class="text-right"><button  type="submit" name="send"><a href="publication.php">Creer un Topic</a></button></div>

<div class=""><input type="text" name="Recherche" placeholder="Rechercher" required="required" class="font-weight-bold"/> 

<button  type="submit" name="envoyer" > SEND </button></div>
</div>

<?php
    

    $result = $bdd->query("SELECT * FROM publication ORDER BY categorie");

    if (!$result){
        echo"la recuperation a echoue";
    }else{
        $nbre = $result->rowCount();
    }
        ?>
 <h4 class="text-center text-uppercase text-danger border bg-white m-3">La table comprend <?= $nbre ?> publication enregistrées</h4>
      

        <?php
    while($data = $result->fetch()){
        ?>
        <div class=" d-block">
           <div class="blocus">  <h4>  <?= $data["categorie"] ?></h4></div>
    
           <div class="blocu"> <h5>  <?=  $data["message_pub"] ?></h5></div> 
    
            <div class="bloc"> <p> <?=  $data["date_pub"] ?> </p> </div>
            
        </div>
        

        <!-- Button to Open the Modal -->

        
<button type="button" class="bloc btn btn-primary" data-toggle="modal" data-target="#myModal">
  Repondre
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Entrez une reponse</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form action="" method="POST">
      <div class="modal-body">
        <input type="email" class="formcontrol w-100 mb-4" placeholder="email" name="email">
        <textarea name="reponse" id="" cols="30" rows="10" class="w-100"></textarea>
      </div>

      <!-- Modal footer -->
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


        </section>

    </section>
</section> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>