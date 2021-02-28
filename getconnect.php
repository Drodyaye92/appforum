<?php 
  
    require_once 'logtraitement.php';

    if(isset($_POST['connect'])){
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['password']);

        $check = $bdd->prepare('SELECT email, mdp FROM dev WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 1)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                
                if(password_verify($password, $data['password']))
                {
                    $_SESSION['user'] = $data['email'];
                    header('Location: dashbord.php');
                    die();
                }else{ header('Location: registration.php'); die(); }
            }else{ header('Location: dashtraitement.php'); die(); }
        }else{ header('Location: dashtraitement.php'); die(); }
    

    }
?>