<?php

require __DIR__ . '../utente.php';
require __DIR__ . '../pagamento.php';
class Ospite extends Utente
{
  protected $loggato;
  public function __construct($name, $surname, $email, $address, $loggato)
  {
    parent::__construct($name, $surname, $email, $address);
    $this->loggato = $loggato;
  }
}
