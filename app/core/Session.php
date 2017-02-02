<?php


namespace app\core;

/**
 * Description of Session
 * Странный по своей реализации класс, да простят меня боги за него...
 * @author rexar
 */
class Session {
    
    public function start(){
        session_start();
    }
    public function destroy(){
        session_destroy();
    }
    public function isAuth(){
        if(isset($_SESSION['auth']))
        {
            if ($_SESSION['auth'] == 1)
                return TRUE;
            else
                return FALSE;
        }
            
        else return FALSE;
    }
    
}
