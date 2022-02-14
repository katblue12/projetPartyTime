<?php
include './vue/createUser.php';
include './config/connexionBdd.php';
include './model/userClass.php';


if (isset($_POST['name_user'])&& isset($_POST['surname_user'])&& isset($_POST['email_user'])&&isset($_POST['telephone_user'])
&& isset($_POST['address1_user'])&& isset($_POST['address2_user'])
&& isset($_POST['city_user'])&& isset($_POST['postcode_user'])
&& isset($_POST['password_user'])&& isset($_POST['confirmPassword'])){
   
    $user = new User($bdd,$_POST['name_user'], $_POST['surname_user'],$_POST['email_user'],
                $_POST['telephone_user'], $_POST['address1_user'], $_POST['address2_user'],$_POST['city_user'],
                $_POST['postcode_user'], $_POST['password_user']);

    


if ($user->userExist($bdd)){

                $user->hashPass(password_hash($_POST['password_user'], PASSWORD_DEFAULT));
                $user->setName($_POST['name_user']);
                $user->setSurname($_POST['surname_user']);
                $user->setEmail($_POST['email_user']);
                $user->setTelephone($_POST['telephone_user']);
                $user->setAddress1($_POST['address1_user']);
                $user->setAddress2($_POST['address2_user']);
                $user->setCity($_POST['city_user']);
                $user->setPostcode($_POST['postcode_user']);
                $user->setPassword($_POST['password_user']);
                $user->createUser($bdd,$name_user,$surname_user,$address1_user,$address2_user,
                $postcode_user,$city_user,$email_user,$telephone_user,$password_user);
  
}
}



   







