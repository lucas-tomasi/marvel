<?php
namespace View;

use Base\Message;
use Exception;
use Base\TemplateRenderer;
use Controller\HeroController;

class StorieView
{
    private $template;
    private $stories;
    private $hero;

    public function __construct()
    {
        $this->template = new TemplateRenderer('stories');
    }

    private function loadHtml()
    {
        if ($this->stories)
        {
            $templates = [];

            foreach($this->stories as $storie)
            {
                $template = new TemplateRenderer('storie');

                $template->parse([
                    'id' => $storie->getId(),
                    'name' => $storie->getTitle(),
                    'description' => $storie->getFullDescription(),
                    'type' => $storie->getType(),
                    'creators' => implode(
                        '',
                        array_map(
                            function($item) {
                                return  "<li>{$item}</li>";
                            },
                            $storie->getCreators()
                        )
                    ),
                    'characters' => implode(
                        '',
                        array_map(
                            function($item) {
                                return  "<li>{$item}</li>";
                            },
                            $storie->getCharacters()
                        )
                    )
                ]);

                $templates[] = $template;
            }

            $this->template->parse([
                'hero' => $this->hero->getName(),
                'stories' => implode('', $templates)
            ]);
        }
    }

    public function load($param)
    {
        try
        {
            if (empty($param['id']))
            {
                throw new Exception('Informe o herói');
            }
            
            $this->hero = HeroController::getHero($param['id']);
            $this->stories = HeroController::getStories($param['id'], 5);

            $this->loadHtml();
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