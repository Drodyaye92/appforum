<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>commentaire</title>
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
<section class =" droite col-lg-7 col-md-7 col-sm-12>

<h4> VOS COMMENTAIRES</h4>


<?php
    require_once 'connexion.php';

    $result = $bdd->query("SELECT * FROM commentaire ORDER BY email");

    if (!$result){
        echo"la recuperation a echoue";
    }else{
        //$nbre = $result->rowCount();
    }
        ?>
 
       <table class="m-auto w-100 border-bg-white">
       <tr class="border bg-white ">
            <th class="text-center text-uppercase "></th>
            <th class="text-center text-uppercase "> &nbsp;</th>
            <th class="text-center text-uppercase "></th>
            
      </tr>
        <?php
    while($data = $result->fetch()){
        ?>
        <div class=" d-block">
           <div class="blocus">  <p>  <?= $data["email"] ?></p></div>
    
           <div class="blocu">
                <h5>  <?=  $data["reponse"] ?></h5> 
                <p class="bloc"> <?=  $data["date_com"] ?> </p> 
          </div>
            
        </div>
        <?php 
    }
        ?>
    </section>
   </section>
</section>
</body>
</html>