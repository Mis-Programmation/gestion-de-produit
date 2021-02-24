<?php


namespace MIS\Core\Routing;


use MIS\Http\Controller\Authentification\LoginController;

class Route
{
    private string $path;
    private string $action;
    private string $matches;

    public function __construct(string $path, string $action)
    {
        $this->path = trim($path,"/");
        $this->action = $action;
    }

    public function matches(string $url):bool
    {

        $path = preg_replace('#:([\w]+)#','([^/]+)',$this->path);
        $pathToMatch = "#^$path$#";
        if(preg_match($pathToMatch,$url,$matches)){

            $this->matches = $matches[0];

            return true;
        }
        return false;
    }

    public function execute()
    {

        $controller = "MIS\\".str_replace("/","\\",ucfirst($this->action));
        $key = array_key_last(explode("/",$this->matches));

        return isset($this->matches) ?
            (new $controller())(explode("/",$this->matches)[$key]) :
            (new $controller())();
    }



}
