<?php 
require_once('connexion.php');

  if( isset($_POST['send'])){
    
     
      $categorie= $_POST['categorie'];
      $message_pub = htmlspecialchars($_POST['message']);
      $date_pub= date("h:i:sa");
      $insert=$bdd->prepare("INSERT INTO publication(categorie,message_pub,date_pub) VALUES(?,?,?)");
      $insert->execute(array(
         $categorie,
         $message_pub, 
         $date_pub
    ));
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
<section class ="col-lg-8 col-md-8 col-sm-12 border-bg-"> 
 
<div>
        <h3 class="text-center">Publier vos POSTS</h3>
</div>     
    
     
   <table class=" w-100">
      
       <form action="publication.php" method="POST" class=" w-100">
       <tr >
          <td>
          <label  class="text-info font-weight-bold"  >Catégories</label></td>
          </td>
          </tr>  
          <tr>
          <td>
         <select  class="formcontrol w-100"  type="text" name="categorie" >
        <option>HTML 5</option>
        <option>CSS 3 </option>
        <option>PHP</option>
         <option>JQUERIE</option>
         <option>BOOTSTRAP</option>
         <option>SYMPHONY</option>MATERIALIZE<option selected><option>SGBD</option><option>PYTHON</option>
         <option>RUBIS</option>
        </select>
         </td> 
       </tr>
       <tr>
       <td>
          <label for=""> message</label>
       </td>
      </tr>
      <tr>
          <td> <textarea type="text" name="message" placeholder="message"  class="font-weight-bold w-100"> </textarea></td>
       </tr>
            
         <tr>
          <td><button type="submit" name="send" class="btn btn-primary btn-block btn-large w-100">Send</button></td>
         </tr>
         </form>
      
   </table>

    </section>
    </section>
    </section>
</body>
</html>
 