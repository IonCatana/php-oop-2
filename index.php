<?php

require_once __DIR__ . '/classi/prodotti/cibi.php';
require_once __DIR__ . '/classi/prodotti/antipulci.php';
require_once __DIR__ . '/classi/utente/registrato.php';
require_once __DIR__ . '/classi/pagamento.php';

//Utente
$utente1 = new Registrato("Nome non valido", "Cognome non valido", "E-mail non valida", "Indirizzo non valido", "IonCatana");

//Copntrollo se tutti i valori ritornano True, in caso di False mostro un errore
if ($utente1->setNameSurname("Ion", "Catana")) {
  echo "Nome e cognome corretti <br>";
} else {
  echo "Nome o cognome non validi <br>";
}

if ($utente1->setEmail("catana.ion17@yahoo.it")) {
  echo "Email corretta <br>";
} else {
  echo "Email non valida <br>";
}

if ($utente1->setAddress("Cascina Merlata 11")) {
  echo "Indirizzo corretto <br>";
} else {
  echo "Indirizzo non valido <br>";
}

if ($utente1->setTelephone("3554089011")) {
  echo "Numero di telefono valido <br>";
} else {
  echo "Numero di telefono non valido <br>";
}

//Se l'utente é loggato allora ha dirito a uno sconto del 20%
if ($utente1->loggato) {
  $utente1->sconto = 20;
  echo "Hai uno sconto del 20%";
}

var_dump($utente1);

//Pagamento
$pagamentoUtente1 = new Pagamento();

//Se tutti i valori ritornano True allora il pagamento é andato a buon fine
if (
  $pagamentoUtente1->setNumeroCarta("0112642347399321") &&
  $pagamentoUtente1->setData("17-03-2024") &&
  $pagamentoUtente1->setNomeCognome("Ion", "Catana") &&
  $pagamentoUtente1->setValidazione("444")
) {
  echo "Pagamento é andato a buon fine";
} else {
  echo "Pagamento rifiutato";
}
//AntiPulci

//chiedo il mese presente per sapere se il prodotto é disponibile o meno
$acquistoAntipulci = new Antipulci('maggio');

if ($acquistoAntipulci->disponibile) {
  echo "<br><br> Prodotto disponibile";
} else {
  echo "<br><br> Prodotto non disponibile";
}
