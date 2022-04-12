<?php

require __DIR__ . '../utente.php';
class Registrato extends Utente
{
  protected $loggato;

  public function __construct($name, $surname, $email, $address, $loggato)
  {
    parent::__construct($name, $surname, $email, $address);
    $this->loggato = $loggato;
  }
}
