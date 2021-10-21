<?php

namespace Controller;

use Base\Message;
use Service\HeroService;

class HeroController
{
    /**
     * Get favorites heroes
     * 
     * @return array $heros Array de heroes favorites
     */
    public static function getFavorites()
    {
        try
        {
            return HeroService::getFavorites();
        }
        catch(\Exception $e)
        {
            Message::showError($e->getMessage());
        }
    }
    
    /**
     * Get hero by ID
     * 
     * @param int $heroId ID hero
     * 
     * @return Model\Hero $hero instance
     */
    public static function getHero($heroId)
    {
        try
        {
            return HeroService::find($heroId);
        }
        catch(\Exception $e)
        {
            Message::showError($e->getMessage());
        }
    }

    /**
     * Get stories by hero ID
     * 
     * @param int $id ID hero
     * @param int $limit Number itens limit
     * 
     * @return array $stories array of Storie instance
     */
    public static function getStories($heroId, $limit = null)
    {
        try
        {
            return HeroService::getStories($heroId, $limit);
        }
        catch(\Exception $e)
        {
            Message::showError($e->getMessage());
        }
    }
}
?>
