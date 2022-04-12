<?php

require __DIR__ . '/../utente.php';
class Registrato extends Utente
{
  protected $loggato = true;
  public $password;

  public function __construct($name, $surname, $email, $address, $password)
  {
    parent::__construct($name, $surname, $email, $address);
    if ($password != "") {

      //se l'utente inserisce una password qualsiasi, conta come registrato  
      $this->loggato = true;    }
  }
}
