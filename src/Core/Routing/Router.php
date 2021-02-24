<?php


namespace MIS\Core\Routing;


class Router
{
    private string $url;
    private array $route = [];
    public function __construct(string $url)
    {
        $this->url = trim($url,"/");
    }

    public function get(string $path, string $action):self
    {
        $this->route[] = new Route($path,$action);

        return $this;
    }


    public function run()
    {

        /** @var Route $route */
        foreach ($this->route as $route)
        {
            if($route->matches($this->url) ){
                $route->execute();
               break;
            }
        }
        return header('HTTP/1.0 404 Not Found');
    }

}
