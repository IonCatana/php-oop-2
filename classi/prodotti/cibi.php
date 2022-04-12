<?php

require_once __DIR__ . '/../prodotti.php';
class Cibi extends Prodotti
{

  public $tagliaAnimale;
  public $animale;

  public function __construct($name, $price, $animale, $taglia)
  {
    parent::__construct($name, $price);

    $this->tagliaAnimale = $taglia;
    $this->animale = $animale;
  }
}
