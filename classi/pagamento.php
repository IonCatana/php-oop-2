<?php

class Pagamento
{
  protected $numeroCarta;
  protected $dataScadenza;
  protected $nomeCognome;
  protected $cifreValidazione;
  public $startdate = "12-04-2022"; //data di oggi

  public function __construct($numeroCarta, $dataScadenza, $nomeCognome, $cifreValidazione)
  {
    $this->numeroCarta = $numeroCarta;
    $this->dataScadenza = $dataScadenza;
    $this->nomeCognome = $nomeCognome;
    $this->cifreValidazione = $cifreValidazione;
  }
  public function setNumeroCarta($numeroCarta)
  {
    //preg_match ritorna 1 in caso positivo di match tra la regex e il parametro
    if (preg_match('^[0-9]{16}+$', $numeroCarta) == 1) {
      $this->numeroCarta = $numeroCarta;
      return true;
    } else {
      false;
    }
  }

  //spiegazione regex qua: https://www.regextester.com/99555 
  //ho aggiunto una modifica rendendo possibile passare il separatore - oltre al separatore / (il formato rimane quello europeo, ovvero dd-mm-yyyy)
  public function setData($data)
  {
    if (preg_match('^([0-2][0-9]|(3)[0-1])(\-||\/)(((0)[0-9])|((1)[0-2]))(\-||\/)\d{4}$', $data)) {
      $this->data = $data;
      return true;
    } else {
      return false;
    }
  }
}
