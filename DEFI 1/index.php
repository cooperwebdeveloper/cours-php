<?php

// fichier index.php
include 'Moto.php';
include 'Race.php';
include 'Logger.php';

$logger = new Logger();

$moto1 = new Moto("Yamaha", "rouge", 120);
$moto2 = new Moto("Suzuki", "bleue", 112);

$race = new Race($moto1, $moto2);
$logger->log($race->startRace());
$logger->log($race->getWinner());

unset($logger);

$logger = new Logger();

$moto1 = new Moto("Yamaha", "rouge", 98);
$moto2 = new Moto("Suzuki", "bleue", 164);

$race = new Race($moto1, $moto2);
$logger->log($race->startRace());
$logger->log($race->getWinner());

unset($logger);
echo 'bonjour les gens!';