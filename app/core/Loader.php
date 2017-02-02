<?php
//namespace app\core;

class Loader {
    
    public function loadClasses ($className) {
        
        $arrayPath = explode('\\', $className);
        $prefix = array_shift($arrayPath);
        
        if ($prefix == 'app')
        {
            $prefix_file = '../app/';
            $file = implode('/',$arrayPath);
        }
        $result = preg_match("/Controller/", $prefix);
        if ($result == 1)
        {
            $prefix_file = '../app/controllers/';
            $file = $prefix;
        }
        
        $path = $prefix_file . $file . '.php';
        
        if (is_file($path))
        {
            require_once $path;
            //echo 'Файл '.$path.' подключен<br>';
        }
    }
}
    

