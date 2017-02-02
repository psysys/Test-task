<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\core;
use app\core\View;

/**
 * Description of Controller
 *
 * @author rexar
 */
class Controller {
    public $view;
    
    function __construct($name){
        $this->view = new View($name);
    }
}
