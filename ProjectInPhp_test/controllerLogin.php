<?php
//----------------------------------------------
//          INCLUDES
//-----------------------------------------------
include './vue/login.php';
include './config/connexionBdd.php';
include './model/userClass.php';

//----------------------------------------------
//          SESSION
//-----------------------------------------------
// $user -> setPassword(password_hash($motpasse, PASSWORD_DEFAULT));
// password_verify($motpasse,$data['password_user']);


//----------------------------------------------
//          TESTS
//-----------------------------------------------
if(isset($_POST['email_user'])&& isset($_POST['password_user'])){
    $user =     new User();
    $user -> setEmail($_POST['email_user']);
    $user -> setPassword($_POST['password_user']);
    if ($user->connectUser($bdd) === true){
        header('location: ./controllerTheParty.php');

       }
    else{
        header('location: ./controllerGenError.php');
    }
}




