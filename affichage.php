<?php
require_once ('connexion.php')


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
    $bdd = new PDO("mysql:host=localhost;dbname=developpeur","root", "");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = $bdd->query("SELECT * FROM publication ORDER BY categorie");

    if (!$result){
        echo"la recuperation a echoue";
    }else{
        $nbre = $result->rowCount();
    }
        ?>
 <h4 class="text-center text-uppercase text-danger border bg-white m-3">La table comprend <?= $nbre ?> publication enregistrées</h4>
       <table class="m-auto w-100 border-bg-white">
       <tr class="border bg-white ">
            <th class="text-center text-uppercase ">categorie</th>
            <th class="text-center text-uppercase "> message&nbsp;</th>
            <th class="text-center text-uppercase ">date_pub</th>
            
        </tr>
        <?php
    while($data = $result->fetch()){
        ?>
        <tr class="lines border bg-white">
            <td><h6>  <?= $data["categorie"] ?></h6></td>
    
            <td><h6>  <?=  $data["message_pub"] ?></h6> </td>
    
            <td> <h6> <?=  $data["date_pub"] ?> </h6> </td>

        </tr>
        <?php
    }
        ?>


        </section>

    </section>
</section> 
</body>
</html>