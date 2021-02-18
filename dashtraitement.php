<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORUM</title>
    <link rel="stylesheet" href="styles/style.css">
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
        
        <form action="" method="POST">
        <div class="form">
            <div class="tab-tete">
               <div class="active"><button>See profile</button></div>
               <div><button> FORUM</button> </div>
               <div><button> Dashbord</button> </div>
               <div><button> Register</button> </div>
               </div>
      </div> 
      </form>  
   </section>
   <section class=" col-lg-6 col-md-6 col-mx-12 gauche">
   <div class="form-element">
<input type="text" class="form-control w-50" placeholder="keyboard" name="role">
   <button type="submit" class="w-15" name="envoyer">search</button>
<button type="submit" class="w-15 bg-danger" name="envoyer">log out</button>
   </div>
<?php
    $bdd = new PDO("mysql:host=localhost;dbname=developpeur","root", "");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $result = $bdd->query("SELECT * FROM dev ORDER BY lastName");

    if (!$result){
        echo"la recuperation a echoue";
    }else{
        $nbre = $result->rowCount();
        ?>

        <h4 class="text-center text-uppercase text-danger border bg-white">La table comprend <?= $nbre ?> developpeurs enregistrées</h4>
       <table class="m-auto">
       <tr class="border bg-white w-75">
            <th class="text-center text-uppercase w-75">lastName</th>
            <th class="text-center text-uppercase w-75">firstName&nbsp;</th>
            <th class="text-center text-uppercase w-75">email</th>
            <th class="text-center text-uppercase w-75">userrole</th>
        </tr>

        <?php
    while($data = $result->fetch()){
        ?>
        <tr>
            <td> <?=  $data["lastName"] ?></td>
            <td> <?=  $data["firstName"] ?></td>
            <td> <?=  $data["email"] ?></td>
            <td> <?=  $data["userrole"] ?></td>
        </tr>
        <?php
    }
        ?>
       </table>
   </section>
       <?php  
    }
?>
</body>
</html>


  