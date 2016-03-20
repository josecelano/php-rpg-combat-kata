<?php

namespace Tests\Kata\Iteration2;

use Kata\Iteration2\Character;
use Tests\Kata\BaseTestCase;

class CharacterTest extends BaseTestCase
{
    /**
     * @var Character
     */
    protected $character;

    public function setUp()
    {
        $this->character = new Character();
    }

    /** @test */
    public function
    it_should_have_health_starting_at_1000_and_level_starting_at_1()
    {
        $this->assertEquals(1000, $this->character->getHealth());
        $this->assertEquals(1, $this->character->getLevel());
    }

    /** @test */
    public function
    it_should_be_dead_is_health_is_0()
    {
        $this->assertEquals($this->character->isDead(), $this->character->getHealth() == 0);
    }

    /** @test */
    public function
    it_should_be_dead_or_live()
    {
        $this->assertEquals($this->character->isDead(), !$this->character->isAlive());
        $this->assertEquals($this->character->isAlive(), !$this->character->isDead());
    }

    /** @test */
    public function
    it_should_be_able_to_deal_damage_to_another_character()
    {
        $damagedCharacter = new Character();
        $initialHealth = $damagedCharacter->getHealth();
        $damage = 10;
        $this->character->dealDamageTo($damagedCharacter, $damage);

        $this->assertEquals($initialHealth - $damage, $damagedCharacter->getHealth());
    }

    /** @test */
    public function
    it_should_be_able_to_health()
    {
        $healedCharacter = new Character();
        $health = $damage = 10;
        $this->character->dealDamageTo($healedCharacter, $damage);
        $healthBeforeBeingHealed = $healedCharacter->getHealth();
        $this->character->healthTo($healedCharacter, $health);

        $this->assertEquals($healthBeforeBeingHealed + $health, $healedCharacter->getHealth());
    }

    /** @test */
    public function
    it_should_not_be_able_to_health_if_is_dead()
    {
        $initialHealth = $this->character->getHealth();
        $deadCharacter = $this->createANewCharacterAndKillIt();
        $health = 10;

        $deadCharacter->healthTo($this->character, $health);

        $this->assertEquals($initialHealth, $this->character->getHealth());
    }

    /** @test */
    public function
    it_should_not_be_healed_over_1000_health()
    {
        $character = $this->aCharacter();

        $this->character->healthTo($character, 1001);

        $this->assertEquals(1000, $character->getHealth());
    }

    /** @test */
    public function
    it_should_dead_if_the_damage_received_is_higher_than_the_actual_health()
    {
        $character = $this->aCharacter();

        $character->dealDamageTo($this->character, 1000000000);

        $this->assertTrue($this->character->isDead());
    }

    /** @test */
    public function
    it_should_receive_only_50_percent_of_the_damage_if_the_attacker_is_5_or_more_levels_below()
    {
        $attacker = $this->aCharacter();
        $enemy = $this->aCharacter();

        $attacker->setLevel($this->character->getLevel() - 5);
        $enemyInitialHealth = $enemy->getHealth();
        $damage = 10;

        $attacker->dealDamageTo($enemy, $damage);

        $this->assertEquals($enemyInitialHealth - ($damage * 0.5), $enemy->getHealth());
    }

    /** @test */
    public function
    it_should_receive_50_percent_more_of_the_damage_if_the_attacker_is_5_or_more_levels_above()
    {
        $attacker = $this->aCharacter();
        $enemy = $this->aCharacter();

        $attacker->setLevel($this->character->getLevel() - 5);
        $enemyInitialHealth = $enemy->getHealth();
        $damage = 10;

        $attacker->dealDamageTo($enemy, $damage);

        $this->assertEquals($enemyInitialHealth - $damage + ($damage * 0.5), $enemy->getHealth());
    }

    /**
     * @return Character
     */
    private function createANewCharacterAndKillIt()
    {
        $character = $this->aCharacter();
        $damage = 10;
        do {
            $this->character->dealDamageTo($character, $damage);
        } while ($character->isAlive());
        return $character;
    }

    /**
     * @return Character
     */
    private function aCharacter()
    {
        $character = new Character();
        return $character;
    }
}