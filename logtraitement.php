<?php
require_once ('connexion.php');
 if(isset($_POST['envoyer'])){
    $lastName = htmlspecialchars($_POST['lastName']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $email =htmlspecialchars( $_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $mdp_conf = htmlspecialchars($_POST['mdp1']);
    $role =htmlspecialchars( $_POST['role']);
    

    if($lastName!="" && $firstName !="" && $email !="" && $mdp !="" && $mdp_conf !="" && $role !=""){
        
    
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
                                $q->bindParam(':roles',$role);
                                $q->execute();
                         
                            header('Location:login.php?reg_err=success');
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