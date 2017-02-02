<?php

namespace app\core;

class View {
    private $title;
    private $controllerName;
    public function __construct($controllerName) {
        $this->controllerName = $controllerName;
    }

    public function render($view,$title,$data = null){
        $this->title = $title;
        include BASEDIR.'/views/template/layout.php';
    }
}
