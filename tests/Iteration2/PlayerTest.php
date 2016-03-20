<?php

namespace Tests\Kata\Iteration2;

use Kata\Iteration2\Character;
use Kata\Iteration2\Player;
use Tests\Kata\BaseTestCase;

class PlayerTest extends BaseTestCase
{
    /** @test */
    public function
    it_should_not_be_able_to_deal_damage_to_himself()
    {
        $player = $this->aPlayer();
        $initialHealth = $player->getHealth();
        $damage = 10;

        $player->dealDamage($player, $damage);

        $this->assertEquals($initialHealth, $player->getHealth());
    }

    /** @test */
    public function
    it_should_be_able_to_deal_damage_to_his_enemies()
    {
        $player = $this->aPlayer();

        $enemy = new Player(new Character());
        $enemyInitialHealth = $enemy->getHealth();
        $damage = 10;

        $player->dealDamage($enemy, $damage);

        $this->assertEquals($enemyInitialHealth - $damage, $enemy->getHealth());
    }

    /**
     * @return Player
     */
    private function aPlayer()
    {
        $player = new Player(new Character());
        return $player;
    }
}