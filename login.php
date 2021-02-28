<?php 
require_once('config.php');
require_once('getconnect.php');
  require_once('logtraitement.php');

  $rule= 'admin';
  $reqrole = $bdd->prepare("SELECT * FROM dev WHERE userrole=?");
  //$reqrole->execute(array($rule));
  $roleExist = $reqrole->rowCount();

  $verif =VerifyAdmin($roleExist);
  switch ($verif) {
 
     case 0:
         $action= 'hidden';
         
        
 
       break;
     case 1:
         $action= ''; 
         
        
       break;
     }
     ?>

 


     
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORUM</title>
    <link rel="stylesheet" href="styles/style1.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
</head>
<body>
   <section class="container-fluid">
  <section class="row">

   <section class=" col-lg-5 col-md-5 col-sm-12 gauche">
        <div class="cote"> 
           <div>
               <img src="images/lacsoftforum.png" alt="" width="350px">
           </div> 
        
        
        <div class="form">
            <div class=" p-3">
               <div class=" btn btn-primary w-100 mb-4" onclick="showConnexionForm();">login</div>
               <div class="btn btn-primary w-100" onclick="showInscritForm();" <?php echo $action; ?> >  sign up </div>
             </div>
      </div>
    </div>
    <form action="" method="post">
        <div class="w-100 mt-5" id="log">
            <div class="login w-75  mx-auto bg-light mb-5">
                  <div class="mot bg-danger">
                    <h4 class=" w-50 d-block mx-auto mb-4 text-white">Connexion</h4>
                  </div>
                  <div class="form p-2">
                    <input type="email" class="form-control mb-3 " placeholder="Email" name="email" >
                    <input type="password" class="form-control mb-3" placeholder="Mot de passe" name="mdp">
                    <input class="w-75 mx-auto d-block btn btn-danger" type="submit" name="connect" value="Connexion">
                  </div>
            </div>
        </div>    
      </form>
      <form action="" method="post">
        <div class=" login w-75 w-75  mx-auto bg-light mb-5" id="inscrit" <?php echo $action; ?>>  
          <div class="mot bg-danger">
            <h4 class=" w-50 d-block mx-auto mb-4 text-white">Inscription</h4>
          </div>
          <div class="form p-2">
            <input type="text" class="form-control mb-3" placeholder="Lastname" name="lastName" >
            <input type="text" class="form-control mb-3" placeholder="firstname" name="firstName" >
            <input type="email" class="form-control mb-3" placeholder="Email" name="email">
            <input type="password" class="form-control mb-3" placeholder="Mot de passe" name="mdp">
            <input type="password" class="form-control mb-3" placeholder="Confirmation de mot de passe" name="mdp1" >
            <select name="userrole" id="" class="mx-auto d-block mb-3">
              <optgroup>
                <option value="choix">-- Role --</option>
                <option value="admin">Admin</option>
                <option value="developpeur"> Developpeur</option>
              </optgroup>
            </select>
            <input class="w-75 mx-auto d-block btn btn-danger" type="submit" name="signup" value="Sign Up"> 
          </div>
        </div>
      </form>
  
   </section>


   <section class=" col-lg-7 col-md-7 col-sm-12 droite">
   
      <div class="text w-75 mx-auto text-center">
        <h1 class="font-weight-bold">Lac Soft Forum</h1>
        <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet doloremque nostrum asperiores aliquam inventore autem odio, ipsum nihil, ipsam ea ipsa earum neque magni quas sapiente velit. Harum, suscipit eius?Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam facere neque, animi et vero provident id unde aliquid ad cupiditate sequi nobis autem iure sit facilis excepturi, laborum quas tenetur?Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat autem quia inventore cum dolores officia fuga, quam repellendus voluptates neque! Aut libero praesentium illum. Nemo dolores distinctio saepe enim possimus?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consequatur id laboriosam accusamus repellendus reprehenderit provident quidem? Ea a itaque, nostrum assumenda perspiciatis facilis! Natus dolore veniam repellat suscipit quisquam dolores.</h4>
      </div>
   
   </section>
   </section>
   </section>
   <script>
       let login = document.getElementById('log');
       let inscr = document.getElementById('inscrit');

       
       login.style.display = "block";

       function showInscritForm(){
           if(login.style.display == "block"){
             login.style.display = "none";
            inscr.style.display = "block";
            
           }
       }
       function showConnexionForm(){
           if(inscr.style.display == "block"){
             inscr.style.display = "none";
            login.style.display = "block";
            
           }
       }

   </script>

   
  <script src="styles/app.js"></script>
</body>
</html>