<?php
namespace View;

use Base\Message;
use Controller\HeroController;
use Exception;
use Base\TemplateRenderer;

class FavoriteHeroesView
{
    private $template;
    private $heroesTemplates;

    public function __construct()
    {
        $this->template = new TemplateRenderer('favorite_heroes');
        $this->heroesTemplates = [];
    }

    private function loadHeroes()
    {
        $heroes = HeroController::getFavorites();

        foreach($heroes as $hero)
        {
            $heroTemplate = new TemplateRenderer('hero');
            $heroTemplate->parse([
                'id' => $hero->getId(),
                'name' => $hero->getName(),
                'description' => $hero->getFullDescription(),
                'image' => $hero->getLargeImage()
            ]);

            $this->heroesTemplates[] = $heroTemplate;
        }
    }

    private function loadTemplate()
    {
        $this->template->parse([
            'heroes' => implode('', $this->heroesTemplates)
        ]);
    }

    public function load()
    {
        try
        {
            $this->loadHeroes();
            $this->loadTemplate();
        }
        catch(Exception $e)
        {
            Message::showError($e->getMessage());
        }
    }

    public function show()
    {
        return $this->template;
    }
}
?>