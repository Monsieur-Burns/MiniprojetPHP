<?php

namespace src;

use \DateTime;

class User
  {

    protected $login;
    protected $password;
    protected $email;
    protected $dateAuth;
    protected $avatar;
    protected $connection;
    protected $image;





/**
 * ********************** CONSTANTE
 */




/**
 * ********************** CONSTRUCT
 */
 public function __construct(Connection $connection, $login, $password, $email){
   $this->login = $login;
   $this->password = $password;
   $this->email = $email;
   $this->dateAuth = new DateTime('now');
   $this->connection = $connection->connect();


 }//endConstruct


 /**
  * ********************** GETTER/SETTER
  */



  /**
   * Get the value of Login
   *
   * @return mixed
   */
  public function getLogin()
  {
      return $this->login;
  }

  /**
   * Set the value of Login
   *
   * @param mixed login
   *
   * @return self
   */
  public function setLogin($login)
  {
      $this->login = $login;

      return $this;
  }

  /**
   * Get the value of Password
   *
   * @return mixed
   */
  public function getPassword()
  {
      return $this->password;
  }

  /**
   * Set the value of Password
   *
   * @param mixed password
   *
   * @return self
   */
  public function setPassword($password)
  {
      $this->password = $password;

      return $this;
  }

  /**
   * Get the value of Email
   *
   * @return mixed
   */
  public function getEmail()
  {
      return $this->email;
  }

  /**
   * Set the value of Email
   *
   * @param mixed email
   *
   * @return self
   */
  public function setEmail($email)
  {
      $this->email = $email;

      return $this;
  }

  /**
   * Get the value of Date Auth
   *
   * @return mixed
   */
  public function getDateAuth()
  {
      return $this->dateAuth;
  }

  /**
   * Set the value of Date Auth
   *
   * @param mixed dateAuth
   *
   * @return self
   */
  public function setDateAuth($dateAuth)
  {
      $this->dateAuth = $dateAuth;

      return $this;
  }

  /**
   * Get the value of Avatar
   *
   * @return mixed
   */
  public function getAvatar()
  {
      return $this->avatar;
  }

  /**
   * Set the value of Avatar
   *
   * @param mixed avatar
   *
   * @return self
   */
  public function setAvatar($avatar)
  {
      $this->avatar = $avatar;

      return $this;
  }

  /**
   * Get the value of Connection
   *
   * @return mixed
   */
  public function getConnection()
  {
      return $this->connection;
  }

  /**
   * Set the value of Connection
   *
   * @param mixed connection
   *
   * @return self
   */
  public function setConnection($connection)
  {
      $this->connection = $connection;

      return $this;
  }

  /**
   * Get the value of Image
   *
   * @return mixed
   */
  public function getImage()
  {
      return $this->image;
  }

  /**
   * Set the value of Image
   *
   * @param mixed image
   *
   * @return self
   */
  public function setImage($image)
  {
      $this->image = $image;

      return $this;
  }


/**
 * ********************** METHODE
 */


public function checkMail(User $user){
  if (preg_match("/.+\@.+\..+/i", $user->email) == true ){
    return true;
  }
}

public function checkUrlImage(User $user){
  $pattern='/^(http)s?(:\/\/)(.+.)?(facebook|google|twitter)(.+)$/i';
  if (preg_match($pattern, $user->image) == true ) {
    return true;
  }
}



/**
 * ********************** STATIC METHODE
 */

 public static function cryptPassword(User $user){
   $user->password = sha1($user->password);
 }











}//endClass


 ?>
