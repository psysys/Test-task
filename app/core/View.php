<?php

namespace app\core;
use app\core\Session;

class View {
    
    public $title;
    private $controllerName;
    public $session;
    public function __construct($controllerName) {
        $this->controllerName = $controllerName;
        $this->session = new Session();
        
    }

    public function render($view,$title = null,$data = null){
        if ($title != null)
        $this->title = $title;
        include BASEDIR.'/views/template/layout.php';
    }
}
