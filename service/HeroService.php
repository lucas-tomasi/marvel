<?php

namespace Service;

use Model\Hero;
use Model\Storie;
use service\MarvelService;

class HeroService
{
    const ENDPOINT = '/v1/public/characters/';
    
    /**
     * List heroes
     * 
     * @param int $id ID hero
     * @param int $offset Number of items offset
     * @param int $limit Number of items limit
     * @param int $order field order results
     * 
     * @return $heros
     */
    public static function list($filter = [], $offset = 0, $limit = 20, $order = null)
    {
        return MarvelService::get(self::ENDPOINT, array_merge($filter, ['offset'=> $offset, 'limit' => $limit, 'orderBy' => $order]));
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
        $param = [];

        if ($limit)
        {
            $param['limit'] = $limit;
        }

        $response = MarvelService::get(self::ENDPOINT . $heroId . '/stories', $param);

        if (empty($response->results))
        {
            throw new \Exception("Histórias não encontradas, para o herói: {$heroId}");
        }

        $stories = [];

        foreach ($response->results as $result)
        {
            $storie = new Storie;
            $storie->setId($result->id);
            $storie->setTitle($result->title);
            $storie->setDescription($result->description);
            $storie->setType($result->type);
            $storie->setThumbnail($result->thumbnail);
            $storie->setCreators(array_column($result->creators->items, 'name'));
            $storie->setCharacters(array_column($result->characters->items, 'name'));

            $stories[] = $storie;
        }

        return $stories;
    }

    /**
     * Get hero by ID
     * 
     * @param int $id ID hero
     * 
     * @return Model\Hero $hero instance
     */
    public static function find($id)
    {
        $response = MarvelService::get(self::ENDPOINT . $id);

        if (empty($response->results))
        {
            throw new \Exception("Herói não encontrado: {$id}");
        }

        $result = $response->results[0];
        $heroMarvel = new Hero();
        $heroMarvel->setId($result->id);
        $heroMarvel->setName($result->name);
        $heroMarvel->setDescription($result->description);
        $heroMarvel->setThumbnail($result->thumbnail);

        return $heroMarvel;
    }

    /**
     * Get favorites heroes
     * 
     * @return array $heros Array de heroes favorites
     */
    public static function getFavorites()
    {
        if (! Hero::FAVORITES)
        {
            return [];
        }

        $characters = [];
        
        foreach(Hero::FAVORITES as $favoriteId)
        {
            $characters[] = self::find($favoriteId);
        }

        return $characters;
    }
}