<?php

class Pagamento
{
  protected $numeroCarta;
  protected $dataScadenza;
  protected $nomeCognome;
  protected $cifreValidazione;
  public $dataOggi = "12-04-2022";

  /*public function __construct($numeroCarta, $dataScadenza, $nomeCognome, $cifreValidazione)
  {
    $this->numeroCarta = $numeroCarta;
    $this->dataScadenza = $dataScadenza;
    $this->nomeCognome = $nomeCognome;
    $this->cifreValidazione = $cifreValidazione;
  }*/
  public function setNumeroCarta($numeroCarta)
  {
    //preg_match ritorna 1 in caso positivo di match tra la regex e il parametro
    if (preg_match('~^[0-9]{16}+$~', $numeroCarta) == 1) {
      $this->numeroCarta = $numeroCarta;
      return true;
    }
  }

  //spiegazione regex qua: https://www.regextester.com/99555 
  //ho aggiunto una modifica rendendo possibile passare il separatore - oltre al separatore / (il formato rimane quello europeo, ovvero dd-mm-yyyy)
  public function setData($data)
  {
    if (preg_match('~^([0-2][0-9]|(3)[0-1])(\-||\/)(((0)[0-9])|((1)[0-2]))(\-||\/)\d{4}$~', $data)) {

      //assegno la data di scadenza correttamente
      $this->dataScadenza = $data;

      //tramite la funzione strtotime converto la data in un valore numerico
      $expire = strtotime($this->dataScadenza);

      //se é piú grande significa che é oltre la data di oggi
      $today = strtotime($this->dataOggi);

      //li confronto
      if ($expire > $today) {
        return true;
      }
    }
  }

  public function setNomeCognome($nome, $cognome)
  {
    //il nome e il cognome non devono essere numerici più corti di 2 caratteri
    if (!is_numeric($nome) && strlen($nome) > 1 && !is_numeric($cognome) && strlen($cognome) > 1) {

      $this->nome = $nome;
      $this->cognome = $cognome;
      return true;
    }
  }

  public function setValidazione($numeroPin)
  {
    //l'utente deve inserire solo 3 numeri del retro della carta
    if (preg_match('^[0-9]{3}+$', $numeroPin) == 1) {

      $this->cifreValidazione = $numeroPin;
      return true;
    }
  }
}


