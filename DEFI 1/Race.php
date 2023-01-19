
<?php

class Race
{
    public Moto $moto1;
    public Moto $moto2;

    public function __construct(Moto $moto1, Moto $moto2)
    {
        $this->moto1 = $moto1;
        $this->moto2 = $moto2;
    }

    public function startRace(): string
    {
        return sprintf(
            'Course lancée. Vitesse moto 1 : %s. Vitesse moto 2 : %s',
            $this->moto1->maxSpeed,
            $this->moto2->maxSpeed
        );
    }

    public function getWinner(): string
    {
        if ($this->moto1->maxSpeed > $this->moto2->maxSpeed) {
            return 'Moto 1 gagne';
        }

        return 'Moto 2 gagne';
    }
}