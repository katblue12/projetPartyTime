<?php

//-------------------------------------------------------
//                      SESSION
//-------------------------------------------------------
session_start();

//-------------------------------------------------------
//                     CREATION OF CLASS AND ATTRIBUTES
//-------------------------------------------------------

class User {
    //attributes of my bdd table 
    
    private $name_user;
    private $surname_user;
    private $address1_user;
    private $address2_user;
    private $postcode_user;
    private $city_user;
    private $email_user;
    private $telephone_user;
    private $password_user;

//-------------------------------------------------------
//                     CONSTRUCTOR
//-------------------------------------------------------
//constructor has to be the same as the attributes of the bdd
    public function _construct($name_user, $surname_user, $address1_user, $address2_user, $postcode_user, $city_user, $email_user, $telephone_user, $password_user){
  

//same as called in function construct
        $this->name_user = $name_user;
        $this->surname_user= $surname_user;
        $this->address1_user = $address1_user;
        $this->address2_user = $address2_user;
        $this->postcode_user = $postcode_user;
        $this->city_user = $city_user;
        $this->email_user =  $email_user;
        $this->telephone_user = $telephone_user;
        $this->password_user =  $password_user;
    }

//-------------------------------------------------------
//                     GETTERS AND SETTERS
//-------------------------------------------------------

    public function getIduser(){
        return $this->id_user;
    }  

    public function setIduser($newIduser){
        $this->id_user=$newIduser;
    }
    public function getName(){
        return htmlspecialchars(strip_tags($this->name_user));
    }

    public function setName($newUserName){
       $this->name_user = $newUserName;
    }

    public function getSurname(){
        return htmlspecialchars(strip_tags($this->surname_user));
    }

    public function setSurname($newSurName){
       $this->surname_user = $newSurName;
    }

    public function getAddress1(){
        return htmlspecialchars(strip_tags($this->address1_user));
    }

    
    public function setAddress1($newAddline1){
       $this->address1_user = $newAddline1;
    }

    public function getAddress2(){
        return htmlspecialchars(strip_tags($this->address2_user));
    }

    
    public function setAddress2($newAddline2){
       $this->address2_user = $newAddline2;
    }

    public function getPostcode(){
        return htmlspecialchars(strip_tags($this->postcode_user));
    }

    public function setPostcode($newPostCode){
       $this->postcode_user = $newPostCode;
    }

    public function getCity(){
        return htmlspecialchars(strip_tags($this->city_user));
    }

    public function setCity($newCityName){
       $this->city_user = $newCityName;
    }

    public function getEmail(){
        return htmlspecialchars(strip_tags($this->email_user));
    }

    public function setEmail($newEmail){
       $this->email_user = $newEmail;
    }

    public function getTelephone(){
        return htmlspecialchars(strip_tags($this->telephone_user));
    }

    public function setTelephone($newPhone){
       $this->telephone_user = $newPhone;
    }

    public function getPassword(){
        return htmlspecialchars(strip_tags($this->password_user));
    }
   
    public function setPassword($newMdp){
       $this->password_user = $newMdp;
    }

   //-------------------------------------------------------
//                      METHOD HASH PASSWORD
//-------------------------------------------------------

     
 public function hashPass(){

        password_hash($_POST['password_user'], PASSWORD_DEFAULT());
    }
   //-------------------------------------------------------
//                      METHOD CREATE USER
//-------------------------------------------------------

//get the information input by the user and stock in variables to transport to the bdd
    public function createUser($bdd,$name_user,$surname_user,$address1_user,$address2_user,
                               $postcode_user,$city_user,$email_user,$telephone_user, $password_user){
        
        $name_user = $this-> htmlspecialchars(strip_tags(getName()));
        $surname_user = $this-> htmlspecialchars(strip_tags(getSurname()));
        $address1_user= $this->htmlspecialchars(strip_tags(getAddress1()));
        $address2_user = $this-> htmlspecialchars(strip_tags(getAddress2()));
        $postcode_user= $this-> htmlspecialchars(strip_tags(getPostcode()));
        $city_user    = $this->htmlspecialchars(strip_tags(getCity()));
        $email_user   = $this->htmlspecialchars(strip_tags(getEmail()));
        $telephone_user = $this->htmlspecialchars(strip_tags(getTelephone()));
        $password_user = $this->htmlspecialchars(strip_tags(getPassword()));
      
    
//connexion de bdd included 
    try{
        $req = $bdd->prepare('INSERT INTO user(name_user, surname_user, address1_user, address2_user, postcode_user, city_user, email_user, telephone_user, password_user)
        VALUES (:name_user, :surname_user, :address1_user, :address2_user, :postcode_user, :city_user, :email_user, :telephone_user, :password_user)');
    //STOCK THE BDD WITH THE INFO FROM THE GETTER THIS IS SET IN THE CONTROLLER
        $req->execute(array(
            'name_user' =>$name_user,
            'surname_user' =>$surname_user,
            'address1_user'=>$address1_user,
            'address2_user'=>$address2_user,
            'postcode_user'=>$postcode_user,
            'city_user'    =>$city_user,
            'email_user'   =>$email_user,
            'telephone_user'=>$telephone_user,
            'password_user'=>$password_user,
          
        ));
    
    }
         catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}
//-------------------------------------------------------
//   METHOD TO CHECK IF USER IS ALREADY IN THE DATABASE
//   NOT WORKING CHECK WHY 
//-------------------------------------------------------
public function userExist($bdd){
        $usermailex = htmlspecialchars(strip_tags($this->getEmail()));
        try {
        $checkDatabase = $bdd->prepare ('SELECT FROM user WHERE email_user = "'.$usermailex.'"');
        $checkDatabase -> execute(array('email_user'=>htmlspecialchars(strip_tags($this->getEmail()))));
    
    while($emailCheck = $checkDatabase -> fetch()){
        if($usermailex == $emailCheck['email_user']){
            return true;
            
    
        }        else {
            return false;
        }
    }
    
}
 catch(Exception $e){
     die('error: '.$e->getMessage());
 }
}

//-------------------------------------------------------
//   METHOD CONNECTTION CREATION OF TOKEN FOR SESSION
//-------------------------------------------------------
          public function connectUser($bdd){
          $userName = htmlspecialchars(strip_tags($this->getEmail()));
          $motpasse = htmlspecialchars(strip_tags($this->getPassword()));

       try{
          $req = $bdd->prepare("SELECT * FROM user WHERE email_user = '".$userName."' AND password_user = '".$motpasse."' LIMIT 1");
          $req->execute(array(
          'email_user'=> htmlspecialchars(strip_tags($this->getEmail())),
          'password_user'=> htmlspecialchars(strip_tags($this->getPassword())),
          ));
    
          while ($data= $req -> fetch()){
    
          if($userName == $data['email_user'] AND $motpasse == $data['password_user']){
              $usid = $data['id_user'];
              $nom = $data['name_user'];
              $nomFam = $data['surname_user'];
              $ads1 = $data['address1_user'];
              $ads2 = $data['address2_user'];
              $pc = $data['postcode_user'];
              $place = $data['city_user'];
              $mail = $data['email_user'];
              $tel = $data['telephone_user'];
              $pasw = $data['password_user'];

              //take information from bdd to stock the token in terms of the user 
    
            //   token
              $_SESSION['iduser'] = $usid;
              $_SESSION['nameuser'] = $nom;
              $_SESSION['surnameuser'] = $nomFam;
              $_SESSION['address1user'] = $ads1;
              $_SESSION['address2user'] = $ads2;
              $_SESSION['postcodeuser'] = $pc;
              $_SESSION['cityuser'] = $place;
              $_SESSION['emailuser'] = $mail;
              $_SESSION['telephoneuser'] = $tel;
              $_SESSION['connected'] = true;
    
             return true;
          }
        }
          
        }
        catch(Exception $e){
          die('Error : '.$e->getMessage());

      }
    
}
//--------------------------------------------------------------------
//   METHOD TO RETRIEVE INFORMATION FROM DBB FOR MY ACCOUNT PAGE
//--------------------------------------------------------------------
public function displayUser(){
    $req=$bdd->prepare('SELECT * FROM user(name_user, 
                                        surname_user, 
                                        address1_user, 
                                        address2_user,
                                        postcode_user, 
                                        city_user, 
                                        email_user, 
                                        telephone_user,
                                        password_user)');
    $req->execute(array(

                        'name_user'=>$this->htmlspecialchars(strip_tags(getName())),
                        'surname_user'=>$this->htmlspecialchars(strip_tags(getSurname())),
                        'address1_user'=>$this->htmlspecialchars(strip_tags(getAddress1())),
                        'address2_user'=>$this->htmlspecialchars(strip_tags(getAddress2())),
                        'postcode_user'=>$this->htmlspecialchars(strip_tags(getPostcode())),
                        'city_user'=>$this->htmlspecialchars(strip_tags(getCity())),
                        'email_user'=>$this->htmlspecialchars(strip_tags(getMail())),
                        'telephone_user'=>$this->htmlspecialchars(strip_tags(getTelephone())),
                        'password_user'=>$this->htmlspecialchars(strip_tags(getPassword()))));
    $result=$req->fetch();
    $result->execute();

}

//-------------------------------------------------------
//            METHOD TO UPDATE INFO IN MY ACCOUNT PAGE
//-------------------------------------------------------

// public function updateUser(){
//     $req=$bdd->prepare('ALTER * TABLE user WHERE ')

// }
//-------------------------------------------------------
// METHOD TO DELETE USER AND INFO FROM BDD MY ACCOUNT PAGE
//-------------------------------------------------------
// public function deleteUser(){
//     $req=$bdd->prepare('DELETE * FROM user WHERE ')

// }


}




?>