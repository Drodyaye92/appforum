<?php
require_once("connexion.php");
if (isset($_POST['psubmit]'])){
        if(isset($_POST['psujet'],$_POST['pcontenu'])){

                $psujet = htmlspecialchars($_POST['psujet']);
                $theme = htmlspecialchars($_POST['pcontenu']);

             if(!empty($psujet) AND !  ($pcontenu)){

                   if(strlen($psujet)<= 70){
                        if (isset($_POST['email'])){
                                $notif_email = 1;
                           }else{
                                 $notif_email = 0;
                             }
                        $ins = $bdd->prepare ('INSERT INTO sujet (psujet,pcontenu, email,datepub)VALUES(?,?,?,NOW())');
                        $ins ->execute(array($psujet,$pcontenu,0));
                
                
                    }else{
                        $perror = "votre publication ne peut pas depasser 70 caracters";
                          }
                    }else{ $error = "veuillez renseigner";
               }
        }
}  

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forum</title>
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
  
           </div>
        </section> 
        <section class="col-lg-8 col-md-8 col-sm-12">
<div class="col-3"> <tr> <td>Message</td></tr></div>
<div class="col-9"></div>
<div></div>
        </section>





   </section> 
</section>   
</body>
</html>