<?php

class User
{
    public string $civility;
    public string $surname = 'Doe'; // ceci est une valeur par defaut
    public string $name;
}


require_once('User.php'); // Si notre classe est dans un fichier à part, il faut l'inclure

$user = new User(); // On remarque le mot-clé "new" suivi de l'appel à la fonction correspondant à notre classe


include('User.php');  /// on appelle notre fichier qui contient la classe

$user = new User();
echo $user->name; // Affiche "John", qui était la valeur par défaut de notre champ

//=============================================================================


include('User.php');

$robert = new User(); // On crée une instance de User qu'on assigne à la variable $robert
$robert->name = 'Robert'; // Le champ "name" de la variable $robert contient maintenant "Robert", écrasant la valeur par défaut "John".

$laure = new User(); // On crée une deuxième instance de User qu'on assigne à la variable $laure
$laure->name = 'Laure'; // Le champ "name" de la variable $laure contient maintenant "Laure", écrasant la valeur par défaut "John".
$laure->surname = 'Dupond'; // Le champ "surname" de la variable $laure contient maintenant "Dupond"

echo $laure->name; // Affiche "Laure"
echo $robert->name; // Affiche "Robert"

// Avec le même "moule", on a créé deux objets : Laure et Robert !




//=================================================================


// fichier Moto.php
class Moto
{
    public string $brand;
    public string $color;
    public float $maxSpeed;
}

//require_once 'Moto.php'

$myMoto = new Moto();
$myMoto->brand = 'Yamaha';
$myMoto->color = 'Rouge';
$myMoto->maxSpeed = 210;

$otherMoto = new Moto();
$myMoto->brand = 'Suzuki';
$myMoto->color = 'Blue';
$myMoto->maxSpeed = 220;

//===============================================================


class MaClasse
{
    public string $propriete1;

    public function __construct(string $valeurPropriete1)
    {
        $this->propriete1 = $valeurPropriete1;
    }
}

$objet = new MaClasse('valeur');



//===============================================

// fichier Moto.php
class Moto
{
    public string $brand;
    public string $color;
    public float $maxSpeed;

    public function __construct($brand, $color, $maxSpeed)
    {
        $this -> brand = $brand;
        $this -> color = $color;
        $this -> maxSpeed = $maxSpeed;

    }

    public function getDescription(): string
    {
        return $this->brand.' '.$this->color.' ayant une vitesse maximale de '.$this->maxSpeed.'km/h'.PHP_EOL;
    }
}

//require_once 'Moto.php'

$myMoto = new Moto('Yamaha', 'Rouge', 210);


$otherMoto = new Moto('Suzuki', 'Blue', 220);

$fooMoto = new Moto('Piaggio', 'violet', 217);

echo $myMoto->getDescription();
echo $otherMoto->getDescription();
echo $fooMoto->getDescription();

//          __destruct()


class DestroyMe
{
    function __destruct()
    {
        echo 'Je suis mort !';
    }
}

$destroyMe1 = new DestroyMe();
unset($destroyMe1); // Affiche "Je suis mort !"

$destroyMe2 = new DestroyMe();

$destroyMe3 = new DestroyMe();
$destroyMe3 = null; // Affiche "Je suis mort !"


//Affiche "Je suis mort !" car le script est terminé, donc l'objet $destroyMe2 est détruit automatiquement


//========================================================================================
//========================================================================================
//========================================================================================


class Couple
{
    // Un couple est composé de deux utilisateurs :
    public User $user1;
    public User $user2;

    public function __construct(User $user1, User $user2)
    {
        $this->user1 = $user1;
        $this->user2 = $user2;
    }
}

$laure = new User('Laure', 'Dupont');
$robert = new User('Robert', 'Durand');

$couple = new Couple($laure, $robert);

//===================================================================================



// fichier Moto.php
class Moto
{
    public string $brand;
    public string $color;
    public float $maxSpeed;

    public function __construct($brand, $color, $maxSpeed)
    {
        $this -> brand = $brand;
        $this -> color = $color;
        $this -> maxSpeed = $maxSpeed;

    }

    public function getDescription(): string
    {
        return $this->brand.' '.$this->color.' ayant une vitesse maximale de '.$this->maxSpeed.'km/h'.PHP_EOL;
    }
}

//require_once 'Moto.php'

$myMoto = new Moto('Yamaha', 'Rouge', 210);


$otherMoto = new Moto('Suzuki', 'Blue', 220);

$fooMoto = new Moto('Piaggio', 'violet', 217);

echo $myMoto->getDescription();
echo $otherMoto->getDescription();
echo $fooMoto->getDescription();



//=========================== EXERCICE


// fichier Race.php
class Race
{
    public Moto $moto1;
    public Moto $moto2;

    public function __construct(Moto $moto1, Moto $moto2)
    {
        $this->moto1 = $moto1;
        $this->moto2 = $moto2;
    }

    public function startRace(): Moto
    {
        if ($this->moto1->maxSpeed > $this->moto2->maxSpeed) {
            return $this->moto1;
        }

        return $this->moto2;
    }
}


// fichier index.php
include 'Moto.php';
include 'Race.php';

$moto1 = new Moto("Yamaha", "rouge", 210);
$moto2 = new Moto("Suzuki", "bleue", 180);

$race = new Race($moto1, $moto2);
echo $race->startRace()->getDescription();
// cette ligne va donc lancer la fonction startRace dans la classe Race puis retourner la description de la moto qui aura gagné la course. Pour rappel, la fonction startRace va retourner une moto gagnante (class Moto) et la fonction getDescription est présente dans la classe Moto.

//========== ma solution qui marche aussi


// fichier Moto.php
class Moto
{
    public string $brand;
    public string $color;
    public float $maxSpeed;

    public function __construct(string $brand, string $color, float $maxSpeed)
    {
        $this->brand = $brand;
        $this->color = $color;
        $this->maxSpeed = $maxSpeed;
    }

    public function getDescription(): string
    {
        return $this->brand.' '.$this->color.' ayant une vitesse maximale de '.$this->maxSpeed.'km/h'.PHP_EOL;
    }

    public function __destruct() {
        echo $this->brand.' '.$this->color.' rentre au garage'.PHP_EOL;
    }
}

//fichier Race.php

// ecrire une class Race qui va organiser une course entre deux motos

class Race
{

    public function motoRace (Moto $moto1, Moto $moto2) : string
    {
        if ($moto1 -> maxSpeed > $moto2 -> maxSpeed )
        {
            return 'La moto '.$moto1 -> brand.' '.$moto1 -> color.' a gagné!';
        }
        else
        {
            return 'La moto '.$moto2 -> brand.' '.$moto2 -> color.' a gagné!';
        }
    }

    public function __destruct()
    {
        echo 'La moto : '.$moto1 -> brand.' '.$moto1 -> color.' rentre au garage!'.PHP_EOL;
        echo 'La moto : '.$moto2 -> brand.' '.$moto2 -> color.' rentre aussi au garage!'.PHP_EOL;
    }
}



//fichier index.php

$myMoto = new Moto('Yamaha', 'Rouge', 210);


$otherMoto = new Moto('Suzuki', 'Blue', 220);

$fooMoto = new Moto('Piaggio', 'violet', 217);


$course1 = new Race;

var_dump($course1-> motoRace($otherMoto, $fooMoto));














