<?php
 public function userLogin($bdd){
    //       $userName = $this->getEmail();
    //       $motpasse = $this->getPassword();
    //    try
    //     {
    //       $response = $bdd->query('SELECT * FROM user WHERE email_user = '.$userName.' AND password_user = '.$motpasse.' LIMIT 1');
                    
    
    //       while ($data= $response -> fetch()){
    
    //       if($userName == $data['email_user'] AND $motpasse == $data['password_user']){
    //           $usid = $data['id_user'];
    //           $nom = $data['name_user'];
    //           $nomFam = $data['surname_user'];
    //           $ads1 = $data['address1_user'];
    //           $ads2 = $data['address2_user'];
    //           $pc = $data['postcode_user'];
    //           $place = $data['city_user'];
    //           $mail = $data['email_user'];
    //           $tel = $data['telephone_user'];
    //           $pasw = $data['password_user'];
    
    //         //   token
    //           $_SESSION['iduser'] = $usid;
    //           $_SESSION['nameuser'] = $nom;
    //           $_SESSION['surnameuser'] = $nomFam;
    //           $_SESSION['address1user'] = $ads1;
    //           $_SESSION['address2user'] = $ads2;
    //           $_SESSION['postcodeuser'] = $pc;
    //           $_SESSION['cityuser'] = $place;
    //           $_SESSION['emailuser'] = $mail;
    //           $_SESSION['telephoneuser'] = $tel;
    //           $_SESSION['passworduser'] = $pasw;
    //           $_SESSION['connected'] = true;
    
             
    //       }
    //     }
    // }
    //     catch(Exception $e){
    //       die('Error : '.$e->getMessage());
    // }
    //   }
    
        
    //     public function userLoggedin($bdd){
    //         $userName = $this->getEmail();
    //         $motpasse = $this->getPassword();
    
    //         try{
    //             $response = $bdd->query('SELECT * FROM user WHERE email_user = "'.$userName.' AND password_user = "'.$motpasse.'" LIMIT 1');
    
    //             while ($data= $response -> fetch());{
    //                 if($userName == $data['email_user'] AND $motpasse == $data['password_user']){
    //                     return true;
                       
    //                 }
    //                 else{
    //                     return false;
    //                 }
    //         }
    
    //     }
    //     catch(Exception $e){
    //         die('Error : '.$e->getMessqge());
    //     }
    //   }

    // function to check user's email doesn't already exist

    // public function doesUserExistAlready(){
    //     $checkDatabase = $bdd->prepare ('SELECT FROM user WHERE email_user = :email_user');
    //     $checkDatabase -> execute(array(':email_user'=>getEmail()));
    //     $emailCheck = $checkDatabase -> fetch();

    //     if($emailCheck){
    //         echo'<p>User already exists please login</p><button><a href="controllerLogin.php">Login</a></button>';
    //         return false;
    //     }else{
    //         return true;
    //     }
    // }

//     //function to hash password
//  public function hashPass(){

//         password_hash($_POST['password_user'], PASSWORD_DEFAULT());
//     }



// 'name_user' => $this-> getName(),
// 'surname_user' => $this-> getSurname(),
// 'address1_user'=>$this->getAddress1(),
// 'address2_user'=> $this-> getAddress2(),
// 'postcode_user'=> $this-> getPostcode(),
// 'city_user'    => $this->getCity(),
// 'email_user'   => $this->getEmail(),
// 'telephone_user'=> $this->getTelephone(),
// 'password_user'=> $this->getPassword(),


// if ($_POST['name_user'] == '' || $_POST['surname_user']== '' || $_POST['telephone_user']== '' ||$_POST['address1_user']== '' ||$_POST['address2_user']
//     == '' || $_POST['city_user'] == '' || $_POST['postcode_user']== '' || $_POST['password_user']== '' ||$_POST['confirmPassword']){

//         echo '<p>Please complete all parts of the form</p>';
