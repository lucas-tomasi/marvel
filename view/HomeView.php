<?php
namespace View;

use Base\TemplateRenderer;

class HomeView
{
    private $template;

    public function __construct()
    {
        $this->template = new TemplateRenderer('home');
    }

    public function show()
    {
        return $this->template;
    }
}
?>