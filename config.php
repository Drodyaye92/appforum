
<?php
require_once ('connexion.php');
 $lastName = ('lastName');
 $firstName = ('firstName');
 $email =( 'email');
 $mdp = ('mdp');
 $mdp_conf = ('mdp1');
 $userrole =('userrole');
 $id_dev = ('id');
 $rolead = ('userrole');
 $reqrole = $bdd->prepare ('SELECT * FROM dev WHERE userrole = ?');
     $reqrole->execute(array('$rolead'));
     $userrole_exist = $reqrole->rowCount();

 function VerifyAdmin($a){ 

     if($a==1){
         return 0;
         
     }else{ return 1;}
 };
 


 
 $verif =VerifyAdmin($userrole_exist);
 switch ($verif) {

    case 0:
        $action= 'active';
        echo "le resultat de la function est 0".$action;

      break;
    case 1:
        $action= 'disabled'; 
      
      break;
    }
    ?>