<?php

namespace Kata\Iteration2;

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
     * @param Character $enemy
     * @param int $damage
     */
    public function dealDamageTo(Character $enemy, $damage)
    {
        if ($enemy->health - $damage < 0) {
            $enemy->health = 0;
            return;
        }

        if ($enemy->level - $this->level >= 5) {
            $damage = $damage * 0.5;
        }

        if ($this->level - $enemy->level >= 5) {
            $damage = $damage + ($damage * 0.5);
        }

        $enemy->health -= $damage;
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

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        // TODO: Code Review. We only need this method for a test.
        $this->level = $level;
    }
}
