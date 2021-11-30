<?php

$uc2 = isset($_GET['uc2']) ? htmlspecialchars($_GET['uc2']) : exit(header('Location: /home'));
$user = new User();
switch($uc2) {
    case "login":
        if($user->isLogged()) exit(header('Location: /home'));
        if(isset($_POST['email'], $_POST['passwd'])) {
            $email = htmlspecialchars($_POST['email']);
            $passwd = htmlspecialchars($_POST['passwd']);
            $user->login($email,$passwd);
            exit(header('Location: /home'));
        }
        $include = "users/login";
        $title = "Se connecter";
    break;
    case "register":
        if($user->isLogged()) exit(header('Location: /home'));
        // if(isset($_POST)) {
        //     // ToDo
        // }
        $include = "users/register";
        $title = "S'inscrire";
    break;
    case "forgot-password":
        if(isset($_GET['uc3'])) {
            $uc3 = htmlspecialchars($_GET['uc3']);
            if(isset($_POST)) {
                if(User::getUserFromForgotToken($uc3)) {
                    $newPasswd = htmlspecialchars($_POST['newPasswd']);
                    $newPasswdConfirm = htmlspecialchars($_POST['newPasswdConfirm']);
                    if($newPasswd == $newPasswdConfirm) {
                        if($user->editPassword(false, $newPasswd, false, $uc3))
                        {
                            Notifications::create("success", "Mot de passe modifié.");
                            exit(header('Location: /home'));
                        }
                        else Notifications::create("danger", "Impossible de modifier le mot de passe.");
                    }
                    else Notifications::create("danger", "Les mots de passe ne correspondent pas.");
                }
                else {
                    $email = htmlspecialchars($_POST['email']);
                    $emailConfirm = htmlspecialchars($_POST['emailConfirm']);
                    if($email == $emailConfirm) User::forgotPassword($email);
                    else Notifications::create("danger", "Les adresses email ne correspondent pas.");
                }
            }
        }
        $include = "users/forgot-password";
        $title = "Mot de passe oublié";
    break;
    case "logout":
        session_destroy();
        unset($_COOKIE['token']);
        setcookie("token", "", time()-3600);
        exit(header('Location: /login'));
    break;
}