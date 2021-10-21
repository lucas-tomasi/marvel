<?php

namespace Base;

class Router
{
    public static function run($request)
    {
        try
        {
            $class  = $request['page']??'HomeView';
            $method = $request['action']??'';

            $className = 'View\\'.$class;

            if (! empty($class) && class_exists($className))
            {
                $page = new $className($_REQUEST);
    
                if (! empty($method))
                {
                    call_user_func_array([$page, $method], [$_REQUEST]);
                }
                
                echo $page->show();
            }
            else
            {
                echo "Ops :(<br>Página não encontrada";
            }
        }
        catch(\Error $e)
        {
            Message::showError($e->getMessage());
        }
    }
}