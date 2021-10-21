<?php
namespace Base;

class TemplateRenderer
{
    /**
     * Base path htmls
     */
    const BASE_FOLDER = 'templates/';
    
    /**
     * Template html 
     */
    private $template;

    /**
     * @param string $templateName name of template
     */
    public function __construct($templateName)
    {
        $this->template = file_get_contents(self::BASE_FOLDER . $templateName . '.html');
    }

    /**
     * Parse variables on template
     * 
     * @param array $params array of key and value
     */
    public function parse($params = [])
    {
        if (empty($params))
        {
            return;
        }

        foreach($params as $key => $value)
        {
            $this->template = str_replace('{$' . $key . '}', $value, $this->template);
        }
    }

    /**
     * return template
     */
    public function show()
    {
        return $this->template;
    }

    /**
     * return template
     */
    public function __toString()
    {
        return $this->show();
    }
}