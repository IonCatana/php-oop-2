<?php

class Utente
{
  protected $name;
  protected $surname;
  protected $email;
  protected $address;
  protected $telephone;
  public $sconto = 0;

  //richiedo obbligatoriamente nome, cognome, indirizzo mail e indirizzo per la spedizione
  public function __construct($name, $surname, $email, $address)
  {
    $this->name = $name;
    $this->surname = $surname;
    $this->email = $email;
    $this->address = $address;    
  }

  //il nome e il cognome non deve essere numerici piú corti di 2 caratteri
  public function setNameSurname($nome, $cognome)
  {
    if (!is_numeric($nome) && strlen($nome) > 1 && !is_numeric($cognome) && strlen($cognome) > 1) {
      $this->name = $nome;
      $this->surname = $cognome;
      return true;
    }
  }

  //controllo che l'email inserita sia valida
  public function setEmail($email)
  {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->$email = $email;
      return true;
    }
  }

  //con str_word_count controllo quante parole ci sono nella stringa, ne chiedo almeno 2 (1 per la via/vicolo/piazza ecc... e l'altra per il nome dell'indirizzo)
  //con preg_match controllo che ci sia un carattere numerico (il civico) nella stringa inserita. Se = 1 allora il riscontro è positivo
  // le tilde ~ servono per delimitare la ricerca, in questo modo i caratteri ricercati possono combaciare in ogni parte della ricerca, + indica che il pattern dev'essere ripetuto almeno una volta, [0-9] indica che ogni carattere deve essere entro questo range numerico
  public function setAddress($address)
  {
    if (str_word_count($address) > 1 && preg_match('~[0-9]+~', $address) == 1) {
      $this->address = $address;
      return true;
    }
  }

  //regex per validare il numero di telefono (^ indica l'inizio del pattern mentre $ indica la fine del pattern, + indica che il pattern dev'essere ripetuto almeno una volta, {10} indica che devono esserci 10 caratteri, [0-9] indica che ogni carattere deve essere entro questo range numerico)
  //preg_match ritorna 1 in caso positivo di match tra la regex e il parametro
  public function setTelephone($phoneNumber)
  {
    if (preg_match('~^[0-9]{10}+$~', $phoneNumber) == 1) {

      $this->telephone = $phoneNumber;
      return true;
    }
  }
}
