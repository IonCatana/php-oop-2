<?php

class Prodotti
{
  //setto delle variabili di base per tutti i prodotti
  protected $id;
  protected $name;
  public $description;
  protected $price;
  public $manufacturer;
  protected $image;

  //rendo necessari il name ed il prezzo
  public function __construct($name, $price)
  {
    $this->name = $name;
    $this->price = $price;
  }

  //creo un ID con un numero a 6 cifre casuale a cui concateno il suo nome e il suo nome del produttore
  public function setID()
  {
    $this->id = rand(100000, 999999) . $this->name . $this->manufacturer;
  }

  //il prezzo deve essere numerico e maggiore o uguale di 20 centesimi
  public function setPrice($prezzo)
  {
    if (is_numeric($prezzo) && $prezzo >= 0.2) {
      $this->price = $prezzo;
      return true;
    } else {
      return false;
    }
  }

  //il nome non dev'essere un numero e dev'essere piú lungo di 2 caratteri
  public function setName($nome)
  {
    if (!is_numeric($nome) && strlen($nome) > 2) {
      $this->name = $nome;
      return true;
    } else {
      return false;
    }
  }
  //l'immagine deve avere un url valido per poter essere caricata correttamente
  public function setImage($url)
  {
    if (filter_var($url, FILTER_VALIDATE_URL)) {
      $this->image = $url;
      return true;
    } else {
      return false;
    }
  }
}
