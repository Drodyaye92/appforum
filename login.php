<?php 
require_once('config.php');
require_once('getconnect.php');
  require_once('logtraitement.php');
 /* if(isset($_POST['envoyer'])){
    $lastName = $_POST['lastName'];
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $mdp_conf = $_POST['mdp1'];
    $role = $_POST['role'];
    $password = password_hash($mdp,PASSWORD_DEFAULT);

      if($lastName!="" && $firstName !="" && $email !="" && $mdp !="" && $mdp_conf !="" && $role !=""){
        $q= $bdd->prepare("INSERT INTO dev (lastName,firstName,email,mdp,userrole) VALUES(:lastn,:firstn,:mail,:mdep,:roles)");

    $q->bindParam(':lastn',$lastName);
    $q->bindParam(':firstn',$firstName);
    $q->bindParam(':mail',$email);
    $q->bindParam(':mdep',$password);
    $q->bindParam(':roles',$role);
    $q->execute();
    }
      } */ 
?>

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

   <section class=" col-lg-=4 col-md-4 col-sm-12 gauche">
        <div class="cote"> 
           <div>
               <img src="images/lacsoftforum.png" alt="" width="350px">
           </div> 
        
        <form action="" method="POST">
        <div class="form">
            <div class="tab-tete">
               <div class=" active btn btn-primary" onclick="showLog();">login</div>
               <div class="btn btn-primary" onclick="showLog();" <?php echo $action ?> >  sign up </div>
             </div>
      </div>
    </div>
        <div class="tab-contenu" id="log">
            <div class="tab-corp active">
              <div class="form-element">
                <input type="email" class="form-control  w-75" placeholder="Email" name="" >
              </div>
              <div class="form-element">
                <input type="password" class="form-control  w-75" placeholder="Mot de passe" name="">
              </div>
              <div class="form-element">
                <input type="submit" name="connect" value="Connexion">
              </div>
        </div>
        </form>
        <div class="tab-corp" id="inscrit">
                    <form action="" method="POST">
                    
              <div class="form-element">
                    <input type="text" class="form-control w-75" placeholder="Lastname" name="lastName" >
              </div>
              <div class="form-element">
                    <input type="text" class="form-control  w-75" placeholder="firstname" name="firstName" >
              </div>
              <div class="form-element">
                    <input type="email" class="form-control  w-75" placeholder="Email" name="email">
              </div>
              <div class="form-element">
                    <input type="password" class="form-control  w-75" placeholder="Mot de passe" name="mdp">
              </div>
              <div class="form-element">
                    <input type="password" class="form-control  w-75" placeholder="Confirmation de mot de passe" name="mdp1" >
              </div>
              <div class="form-element">
                    <input type="text" class="form-control  w-75" placeholder="role" name="role">
              </div>
              <div class="form-element">
                    <button type="submit" name="envoyer">Inscrire</button>
              </div>
              
                    </form>
                    </div>
            </div>
   </section>


   <section class=" col-lg-8 col-md-8 col-sm-12 droite"> 
   
   <h1 class="soft">Lac Soft Forum</h1>
       <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet doloremque nostrum asperiores aliquam inventore autem odio, ipsum nihil, ipsam ea ipsa earum neque magni quas sapiente velit. Harum, suscipit eius?Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam facere neque, animi et vero provident id unde aliquid ad cupiditate sequi nobis autem iure sit facilis excepturi, laborum quas tenetur?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat autem quia inventore cum dolores officia fuga, quam repellendus voluptates neque! Aut libero praesentium illum. Nemo dolores distinctio saepe enim possimus?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur id laboriosam accusamus repellendus reprehenderit provident quidem? Ea a itaque, nostrum assumenda perspiciatis facilis! Natus dolore veniam repellat suscipit quisquam dolores.</h4>
   </section>
   </section>
  <!-- <script>
       let login = document.getElementById('log');
       let inscr = document.getElementById('inscrit');

       
       inscr.style.display = "none";

       function showLog(){
           if(inscr.style.display == "block"){
            inscr.style.display = "none";
            login.style.display = "block";
           }
       }
       function showform(){
           if(log.style.display == "block"){
            login.style.display = "none";
            inscr.style.display = "block";
           }
       }

   </script>-->

   
  <script src="styles/app.js"></script>
</body>
</html>