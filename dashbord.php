<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
    <title>Developpeur login</title>
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
    <section class="col-lg-8 col-md-8 col-mx-12 gauche">
    <div class="form-elemnt">
          <input type="text" class="bare w-50" placeholder="KEYBORD" name="" >
          <button type="submit" class="bar" name="search" value="submit">SEARCH</button>
    </div>
    <?php
 require_once('connexion.php');

if (empty($_POST["submit"])) {
    $q=$bdd->query("SELECT * FROM `dev` WHERE `role`='developpeur' ORDER BY `nom`");
    while ($data = $ret_dev->fetch_array()) {
        echo ("<table  class=tablebody>");
        echo ("<tbody>
<td>
 <h6>" . $data["lastName"] . "</h6>
</td>" . "<td>
<h6>" . $data["firstName"] . "</h6>
</td>" . "<td>
<h6>" . $data["email"] . "</h6>
</td>" . "</tbody>");
        echo ("</table>");
    }
  } else {
  $q = $bdd->query("SELECT * FROM `dev` WHERE `role`='developpeur' ORDER BY `nom`");
  while ($data = $ret_dev->fetch_array()) {
      if (similar_text($data["lastName"], $_POST["search"]) >= 3 || similar_text($data["firstName"], $_POST["search"]) >= 3) {
        echo ("<table  class=tablebody>");
          echo ("<tbody>
<td>
<h6>" . $data["lastName"] . "</h6>
</td>" . "<td>
<h6>" . $data["firstName"] . "</h6>
</td>" . "<td>
<h6>" . $data["email"] . "</h6>
</td>" .  "</tbody>");
          echo ("</table>");
      }
  }
} 
 
 ?>   
    
    
    <div class =  "form-element"> 
              
                   <p>online</p>
                   <td></td>
    </div>
    <div class="form-element">
       
          <p> list of members </p>
          <td></td>
    </div>

    </section>
   </section> 
</body>
</html>