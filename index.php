<?php

require_once __DIR__ . '/classi/prodotti/cibi.php';
require_once __DIR__ . '/classi/utente/registrato.php';
require_once __DIR__ . '/classi/pagamento.php';

$utente1 = new Registrato("Nome non valido", "Cognome non valido", "E-mail non valida", "Indirizzo non valido", "IonCatana");

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

var_dump($utente1);
