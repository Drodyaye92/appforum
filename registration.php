<?php
require_once ('connexion.php');
if(isset($_POST['envoyer'])){
  $lastName = htmlspecialchars($_POST['lastName']);
  $firstName = htmlspecialchars($_POST['firstName']);
  $email =htmlspecialchars( $_POST['email']);
  $mdp = htmlspecialchars($_POST['mdp']);
 // $mdp_conf = htmlspecialchars($_POST['mdp1']);
  $userrole =htmlspecialchars( $_POST['userrole']);
  

  if($lastName!="" && $firstName !="" && $email !="" && $mdp !="" &&  $userrole !=""){
      
  
      if($row == 0){ 
          if(strlen($firstName) <= 100){
              if(strlen($email) <= 100){
                  if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                      $q = $bdd->prepare('SELECT * FROM dev WHERE email = ?');
                       $q->execute(array($email));
                      $row = $q->rowCount();
                      if($row == 0){
                          if($password == $password_retype){
                              $password = password_hash($mdp,PASSWORD_DEFAULT);
      
                              $q= $bdd->prepare("INSERT INTO dev (lastName,firstName,email,mdp,userrole) VALUES(:lastn,:firstn,:mail,:mdep,:roles)");
                              $q->bindParam(':lastn',$lastName);
                              $q->bindParam(':firstn',$firstName);
                              $q->bindParam(':mail',$email);
                              $q->bindParam(':mdep',$password);
                              $q->bindParam(':roles',$userrole);
                              $q->execute();
                       
                          header('Location:affichage.php');
                          die();
                      }
                     
                  }else{ header('Location: login.php?reg_err=password'); die();}
              }else{ header('Location: login.php?reg_err=email'); die();}
          }else{ header('Location: login.php?reg_err=email_length'); die();}
      }else{ header('Location: login.php?reg_err=pseudo_length'); die();}
  }else{ header('Location: login.php?reg_err=already'); die();}
   }
};



?>








<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
</head>
<body>
section class="container-fluid">
   <section class="row">
       <section class=" col-lg-5 col-md-5 col-mx-12 gauche">
           <div class="cote"> 
            <div>
               <img src="images/lacsoftforum.png" alt="" width="350px">
            </div> 
        
         <div action="" method="POST">
         <div class="form">
            <div class="tab-tete">
               <div class="active"><button><a href ="dastraitement.php">See profile</a></button></div>
               <div><button><a href="publication.php">FORUM</a> </button> </div>
               <div><button><a href="dashtraitement.php"> Dashbord</a></button> </div>
               <div><button> <a href="registration.php">Register</a></button> </div>
            </div>
         </div> 
         </div>  
  
           </div>
        </section> 
<section class="col-lg-7 col-md-7 col-sm-12 text-center">
<div class="login centre_forum">
        <h3 class="text-uppercase font-weight-bold">Registration</h3>
       <table align="center">
          <form action="" method="post">
          <tr>
          <td> <input type="text" name="lastName" placeholder="lastNname" required="required" class="font-weight-bold"/></td>
          </tr>
           
            <tr>
          <td> <input type="text" name="firstName" placeholder="firstName" required="required" class="font-weight-bold"/>
            </td>
          </tr>
           <tr>
          <td><input type="email" name="email" placeholder="email" required="required"  class="font-weight-bold"/></td>
          </tr>
            
            <tr>
          <td><input type="password" name="mdp" placeholder="password" required="required" class="font-weight-bold"/></td>
          </tr>
          <tr>
          <td><input type="password" name="conf_mdp" placeholder="password" required="required"  class="font-weight-bold"/></td>
          </tr>
          <tr>
          <td><input type="text" name="userrole" placeholder="role" required="required"  class="font-weight-bold"/></td>
          </tr>
            
            <tr>
          <td><button type="submit" class="btn btn-primary btn-block btn-large" name="envoyer">Inscrire</button></td>
          </tr>
            
          </form>
        </table>
    </div>
    </section>
</body>
</html>