<?php

namespace Kata\Iteration2;

class Player
{
    /**
     * @var Character
     */
    private $character;

    /**
     * Player constructor.
     * @param Character $character
     */
    public function __construct(Character $character)
    {
        $this->character = $character;
    }

    public function getHealth()
    {
        return $this->character->getHealth();
    }

    /**
     * @param Player $enemy
     * @param int $damage
     */
    public function dealDamage(Player $enemy, $damage)
    {
        if ($this->playerIsTryingToDealDamageToHimself($enemy)) return;

        $this->character->dealDamageTo($enemy->character, $damage);
    }

    /**
     * @param Player $player
     * @return bool
     */
    private function playerIsTryingToDealDamageToHimself(Player $player)
    {
        return $player === $this;
    }
}
