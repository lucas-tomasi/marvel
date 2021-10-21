<?php

use Model\Hero;
use Model\Storie;
use PHPUnit\Framework\TestCase;
use Service\HeroService;

class HeroServiceTest extends TestCase
{
    public function testValidateThreeFavoritesExists()
    {
        $this->assertCount(3, Hero::FAVORITES, 'Os três herois não foram definidos');
    }

    public function testValidateFavorites()
    {
        $this->assertInstanceOf(Hero::class, HeroService::find(Hero::FAVORITES[0]), 'Herói 1 inválido');
        $this->assertInstanceOf(Hero::class, HeroService::find(Hero::FAVORITES[1]), 'Herói 2 inválido');
        $this->assertInstanceOf(Hero::class, HeroService::find(Hero::FAVORITES[2]), 'Herói 3 inválido');
    }

    public function testValidateStories()
    {
        $this->assertInstanceOf(
            Storie::class,
            HeroService::getStories(Hero::FAVORITES[0], 1)[0],
            'História inválida'
        );
    }
}
