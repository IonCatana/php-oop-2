<?php

require_once __DIR__ . '/../prodotti.php';

class Antipulci extends Prodotti
{
  public $razza;
  public $animale;
  public $mesiDisponibili = ["maggio", "giugno", "luglio", "agosto"];
  protected $meseAttuale;
  public $disponibile = false;

  //chiedo di verificare se il mese in cui viene acquistato il prodotto è presente tra i mesi disponibili
  //se si' , allora imposto la disponibilità su TRUE
  public function __construct($meseAttuale)
  {
    if (in_array(strtolower($meseAttuale), $this->mesiDisponibili)) {

      $this->disponibile = true;
    }
  }
}
