<?php 
require_once('connexion.php');

if(isset($_POST['send'])){
    $email =htmlspecialchars( $_POST['email']);
    $message_pub =htmlspecialchars ($_POST['message_pub']);

    if($email!="" && $message_pub !="" ){


                    $q = $bdd->prepare('SELECT * FROM publication WHERE email = ?  message_pub = ?  date_pub = ?');
                    $q->execute(array($email,$message_pub,$date_pub));
                   $row = $q->rowCount();
                   if($row == 0){
                      
                           $insert= $bdd->prepare("INSERT INTO publication (email,message_pub,date_pub) VALUES(:email,:message,:date,:)");
                           $insert->execute(array(
                            'email'=> $email,
                            'message'=>$message_pub,
                            'date'=>$date_pub,
                           ));
                          
                    
                       

                   }

                




            
    }
        
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>publication</title>
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
        
         <div action="" method="POST">
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
<section class ="col-lg-8 col-md-8 col-sm-12 border-bg-"> 
 
<div>
        <h3 class="text-center">Publier vos POSTS</h3>
</div>     
    
     
   <table class=" w-100">
      
       <form class="w-100">
       <tr >
          <td>
           <label for=""> email</label>
          </td>
       </tr>
        <tr class="w-100">
          <td><input type="" name="email" placeholder="" required="required"  class="font-weight-bold w-100"/></td>
        </tr>
         
       <tr>
       <td>
          <label for=""> message</label>
       </td>
      </tr>
      <tr>
          <td> <textarea type="text" name="" placeholder="message" required="required"  class="font-weight-bold w-100"> </textarea></td>
       </tr>
            
         <tr>
          <td><button type="submit" class="btn btn-primary btn-block btn-large w-100">Send</button></td>
         </tr>
         </form>
      
   </table>

    </section>
    </section>
    </section>
</body>
</html>
 