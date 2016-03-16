<?php

namespace Kata\Iteration1;

class Character
{
    /**
     * @var int
     */
    private $health = 1000;
    /**
     * @var int
     */
    private $level = 1;

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return int
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @return bool
     */
    public function isDead()
    {
        return $this->health == 0;
    }

    /**
     * @return bool
     */
    public function isAlive()
    {
        return !$this->isDead();
    }

    /**
     * @param Character $damagedCharacter
     * @param int $damage
     */
    public function dealDamageTo(Character $damagedCharacter, $damage)
    {
        if ($damagedCharacter->health - $damage < 0 ) {
            $damagedCharacter->health = 0;
            return;
        }
        $damagedCharacter->health -= $damage;
    }

    /**
     * @param Character $healedCharacter
     * @param int $health
     */
    public function healthTo(Character $healedCharacter, $health)
    {
        if ($this->isDead()) return;
        if ($healedCharacter->health + $health > 1000) {
            $healedCharacter->health = 1000;
            return;
        }

        $healedCharacter->health += $health;
    }
}
