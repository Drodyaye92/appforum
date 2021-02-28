<?php
session_start();
require_once ('connexion.php');
 if(isset($_POST['signup'])){
    
    $lastName = htmlspecialchars($_POST['lastName']);
    $firstName = htmlspecialchars($_POST['firstName']);
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $mdp_conf =$_POST['mdp1'];
    $userrole = $_POST['userrole'];
    

    if($id_dev!="" && $lastName!="" && $firstName !="" && $email !="" && $mdp !="" && $mdp_conf !="" && $userrole !=""){
        
        $lastNameLenght = strlen($lastName);
        $firstNameLenght = strlen($firstName);
        if($lastNameLenght <=20 && $firstNameLenght <=20){
            
                filter_var($email, FILTER_VALIDATE_EMAIL);
                $reqmail = $bdd->prepare("SELECT * FROM dev WHERE email=?");
                $reqmail-> execute(array($email));
                $mailExist = $reqmail->rowCount();
                unset($reqmail);

                if($mailExist == 0){
                    if($mdp == $mdp_conf){
                        $insertdata = $bdd->prepare("INSERT INTO dev( lastName, firstName, email, mdp, userrole)VALUES(?, ?, ?,?,?)");
                        $insertdata->execute(array($lastName, $firstName, $email, $mdp, $userrole));
                        echo '<div class="alert alert-success mt-5" role="alert"> Vous etes inscrit avec success</div>';
                        
                    }else{
                        $error = '<div class="alert alert-danger mt-5" role="alert"> Les mot de passes ne correspondent pas</div>';
                        
                    }
                }else{
                    $error = '<div class="alert alert-danger mt-5" role="alert"> Le email existe deja dans la base de donnee</div>';
                    
                }
           
        }else{
            $error = '<div class="alert alert-danger mt-5" role="alert"> Le nom et le prenom ne doit pas depasser 20 caracteres</div>';
            
        }
       
    
    }else{ 
        $error = '<div class="alert alert-danger mt-5" role="alert"> Vous devez remplir tout les champs</div>';
        
    }
 }
 if(isset($_POST['connect'])){
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ;
    $mdp = sha1($_POST['mdp']);

    if( $email !='' && $mdp !=''){
        
            $reqmail = $bdd->prepare("SELECT * FROM dev WHERE email=?");
            $reqmail->execute(array($email));
            $mailExist = $reqmail->rowCount();
        
               if($mailExist == 1){
                $reqpass = $bdd->prepare("SELECT * FROM dev WHERE mdp=?");
                $reqpass->execute(array($mdp));
                $passexiste = $reqpass->rowCount();
                
                if($passexiste == 1){
                    header('location: publication.php');
                    $error = '<div class="alert alert-success mt-5" role="alert"> Vous etes authentifie avec success</div>';
                }else{
                    $error = '<div class="alert alert-danger mt-5" role="alert"> Votre mot de passe est incorrect</div>';
                }
               }else{
                   
                $error = '<div class="alert alert-danger mt-5" role="alert"> Veillez vous inscrire avant</div>';
               }
        
    }else{
        $error = '<div class="alert alert-danger mt-5" role="alert"> Vous devez remplir tout les champs</div>';
    }
}





       /* if($row == 0){ 
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
 };*/



?>