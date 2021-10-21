<?php

class AutoLoad
{
    const PHP = 'php';
    const FOLDER = ['model', 'controller', 'lib', 'view', 'service'];
    
    public static function process()
    {
        require_once 'Router.php';

        foreach(self::FOLDER as $folder)
        {
            $files = scandir($folder);
            
            foreach ($files as $file)
            {
                $path = './' . $folder . '/' . $file;
                $ext = pathinfo($path, PATHINFO_EXTENSION);

                if ($ext == self::PHP && file_exists($path))
                {
                    require_once $path;
                }
            }
        }
    }    
}

AutoLoad::process();