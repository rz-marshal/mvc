<?php

namespace Application\Core;

class View
{
    protected $loader;
    protected $twig;

    public function render(String $filename, array $data)
    {
        extract($data);
        require_once __DIR__ . "/../views/" . $filename . ".php";
    }

    public function __construct()
    {
        $this->loader = new \Twig_Loader_Filesystem(APPLICATION_PATH . "\\application\\views");
        $this->twig = new \Twig_Environment($this->loader);
    }

    public function twigLoad(String $filename, array $data)
    {

        echo $this->twig->render($filename . ".twig", $data);
    }
}
