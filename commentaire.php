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
               <div class="active"><button>See profile</button></div>
               <div><button> FORUM</button> </div>
               <div><button> Dashbord</button> </div>
               <div><button> Register</button> </div>
            </div>
         </div> 
         </div>  
  
           </div>
        </section> 
<section class ="col-lg-7 col-md-7 col-sm-12>




<?php
    //require_once 'connexion.php';

    $result = $bdd->query("SELECT * FROM commentaire ORDER BY email");

    if (!$result){
        echo"la recuperation a echoue";
    }else{
        $nbre = $result->rowCount();
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
           <div class="blocus">  <h4>  <?= $data["email"] ?></h4></div>
    
           <div class="blocu"> <h5>  <?=  $data["reponse"] ?></h5></div> 
    
            <div class="bloc"> <p> <?=  $data["date_com"] ?> </p> </div>
            
        </div>
        <?php 
    }
        ?>
    </section>
   </section>
</section>
</body>
</html>