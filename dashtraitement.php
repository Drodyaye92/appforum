<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORUM</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="dash.css">
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
   <section class="col-lg-7 col-md-7 col-mx-12 gauche">
   <div class="form-element row m-5">
<input type="text" class="formcontrol w-50" placeholder="keyboard" name="role">
   <button type="submit" class="w-10 " name="envoyer">search</button>
<button type="submit" class="w-10 bg-danger" name="envoyer">log out</button>
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

        <h4 class="text-center text-uppercase text-danger border bg-white m-3">La table comprend <?= $nbre ?> developpeurs enregistrées</h4>
       <table class="m-auto w-100 border-bg-white">
       <tr class="border bg-white ">
            <th class="text-center text-uppercase ">lastName</th>
            <th class="text-center text-uppercase ">firstName&nbsp;</th>
            <th class="text-center text-uppercase ">email</th>
            <th class="text-center text-uppercase">userrole</th>
        </tr>

        <?php
    while($data = $result->fetch()){
        ?>
        <tr class="lines border bg-white">
            <td><h6>  <?= $data["lastName"] ?></h6></td>
    
            <td><h6>  <?=  $data["firstName"] ?></h6> </td>
    
            <td> <h6> <?=  $data["email"] ?> </h6> </td>
    
            <td> <h6> <?=  $data["userrole"] ?> </h6> </td>

        </tr>

       
        
        <?php
    }
        ?>
       </table>
       <div><h4 class="text-center text-uppercase text-danger border bg-white m-3">La table comprend <?= $nbre ?> developpeurs en ligne</h4>
        <table class="m-auto w-100 border-bg-white">
       <tr class="border bg-white ">
            <th class="text-center text-uppercase ">lastName</th>
            <th class="text-center text-uppercase ">firstName&nbsp;</th>
            <th class="text-center text-uppercase ">email</th>
            <th class="text-center text-uppercase">userrole</th>
        </tr>
        </table></div>
   </section>
   <section>
   
</section>
       <?php  
    }
?>
</body>
</html>


  